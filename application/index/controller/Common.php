<?php
/**
 * NAME: Common.php
 * Author: eps
 * DateTime: 7/18/2018 10:01 PM
 */

namespace app\index\controller;

use app\index\model\Category;
use app\index\model\FriendLink;
use app\index\model\Visit;
use app\index\model\Visitor;
use Jenssegers\Agent\Agent;
use think\Controller;
use think\facade\Cache;
use think\facade\Log;
use think\facade\Session;

class Common extends Controller
{
    // 被我抓住了 那就不能给面子
    const ROBOT_REQUEST_TIMES = 50;
    const ROBOT_REQUEST_INTERVAL = 30;

    // 没被我抓住, 那就给你点面子
    const REQUEST_TIMES = 100;
    const REQUEST_INTERVAL = 60;

    const OPEN_CACHE = false;

    public function __construct()
    {
        parent::__construct();
        $time = time();

        if (Session::get('assessDenied') == 1) {
            echo 'DENY YOU o_O!';
        }

        $ipBlackList = Session::get('ipBlackList');
        $requestIp = getIp();

        if (!$requestIp) {
            $this->setAccessDeny();
        }

        if (!$ipBlackList) {
            $ipBlackList = Cache::get('ipBlackList');
            Session::set('ipBlackList', $ipBlackList);
        }
        if (!$ipBlackList) {
            $ipBlackList = [];
            Cache::set('ipBlackList', []);
            Session::set('ipBlackList', []);
        }

        if (in_array($requestIp, $ipBlackList)) {
            $this->setAccessDeny();
        }

        // Session 初始化
        if (!Session::get('categoryList')) {
            $categoryModel = new Category();
            $categoryList = $categoryModel->getCategorys()->toArray();
            Session::set('categoryList', $categoryList);
        }

        // 分析 Request
        $agent = new Agent();
        if ($agent->isRobot()) {
            $robotRequestTime = Session::get('robotRequestTime');
            $robotRequestTimes = Session::get('robotRequestTimes');

            if (!$robotRequestTime && !$robotRequestTimes) {
                Session::set('robotRequestTime', $time);
                Session::set('robotRequestTimes', 1);
            } else {
                Session::set('robotRequestTimes', $robotRequestTimes + 1);
            }

            // 如果Robot在限定时间内 超出了限制的请求次数
            if ($time - $robotRequestTime <= self::ROBOT_REQUEST_INTERVAL && $robotRequestTimes + 1 >= self::ROBOT_REQUEST_TIMES) {
                $ipBlackList[] = $requestIp;
                $this->setAccessDeny($ipBlackList, 'Thief! I got you! ^_^');
            }

            // 如果超出了限定时间, 重置
            if ($time - $robotRequestTime > self::ROBOT_REQUEST_INTERVAL) {
                Session::set('robotRequestTime', $time);
                Session::set('robotRequestTimes', 1);
            }

        } else {
            // 如果不是机器人
            $requestTime = Session::get('requestTime');
            $requestTimes = Session::get('requestTimes');

            if (!$requestTime && !$requestTimes) {
                Session::set('requestTime', $time);
                Session::set('requestTimes', 1);
            } else {
                Session::set('requestTimes', $requestTimes + 1);
            }

            // 如果在限定时间内 超出了限制的请求次数
            if ($time - $requestTime <= self::REQUEST_INTERVAL && $requestTimes + 1 >= self::REQUEST_TIMES) {
                $ipBlackList[] = $requestIp;
                $this->setAccessDeny($ipBlackList);
            }

            // 如果超出了限定时间, 重置
            if ($time - $requestTime > self::REQUEST_INTERVAL) {
                Session::set('requestTime', $time);
                Session::set('requestTimes', 1);
            }

        }

        $year = date('Y', $time);
        $month = date('n', $time);
        $day = date('j', $time);
        $visitModel = new Visit();
        $visitInfo = $visitModel->getVisitByYmd($year, $month, $day);
        $visitId = 0;
        if ($visitInfo) {
            $visitId = $visitInfo->id;
            $bool = $visitModel->setVisitIncByVisitId($visitId, 1);
            if (!$bool) {
                Log::debug('setVisitInc fail!');
            }
        } else {
            $date = date('w', $time);
            if ($date == 0) {
                $date = 7;
            }

            $visitInfo = [
                'year' => $year,
                'month' => $month,
                'day' => $day,
                'date' => $date,
                'visit' => 1,
            ];
            $visitId = $visitModel->addVisit($visitInfo);
        }

        // 收集请求信息
        $isPhone = $agent->isPhone();
        $isDesktop = $agent->isDesktop();
        $userAgent = $agent->getUserAgent();
        $platform = $agent->platform();

        $visitorToken = Session::get('visitorToken');
        $visitorModel = new Visitor();
        $visitorInfo = $visitorModel->getVisitorByIp($requestIp);

        // 如果没有token, 但是 有访客身份
        if (!$visitorToken && $visitorInfo) {
            // 从访客身份中取出 token
            $visitorToken = $visitorInfo->visitor_token;
            Session::set('visitorToken', $visitorToken);
        }

        // 如果没有token
        if (!$visitorToken) {
            // 创建访客
            $visitorData = [
                'ip' => $requestIp,
                'is_phone' => $isPhone ? 1 : 0,
                'is_desktop' => $isDesktop ? 1 : 0,
                'is_weixin' => strpos($userAgent, 'MicroMessenger') ? 1 : 0,
                'browser' => $agent->browser(),
                'device' => $agent->device(),
                'platform' => $platform,
                'platform_version' => $agent->version($platform),
                'user_agent' => $userAgent,
                'create_time' => $time,
                'visit' => 1,
            ];
            $visitorToken = md5(json_encode($visitorData));
            $visitorData['visitor_token'] = $visitorToken;

            $visitorId = $visitorModel->addVisitor($visitorData);
            if (!$visitorId) {
                Log::debug('addVisitor fail!');
            } else {
                Session::set('visitorToken', $visitorToken);
            }
        } else {
            // 如果有token, 更新数据
            $bool = $visitorModel->updateVisitorByVisitorToken($visitorToken, ['last_visit_time' => $time]);
            if (!$bool) {
                Log::debug('updateVisitor fail!');
            }
            $bool = $visitorModel->setVisitIncByVisitorToken($visitorToken, 1);
            if (!$bool) {
                Log::debug('setVisitInc fail!');
            }
        }

        // 如果是手机 转到手机域名
        if ($isPhone) {
            // TODO: header(localtion:
        }

    }

    /**
     * apiSuccess
     * @Author: eps
     * @param $code
     * @param $message
     * @param array $data
     * @return \think\response\Json
     */
    public function apiSuccess($code, $message, $data = [])
    {
        $responseData = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        return json($responseData);
    }

    /**
     * apiError
     * @Author: eps
     * @param $code
     * @param $message
     * @param array $data
     * @return \think\response\Json
     */
    public function apiError($code, $message, $data = [])
    {
        $responseData = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        return json($responseData);
    }

    /**
     * setAccessDeny
     * @Author: eps
     * @param null $ipBlackList
     * @param string $denyMessage
     */
    public function setAccessDeny($ipBlackList = null, $denyMessage = 'ACCESS DENY')
    {
        Session::set('assessDenied', 1);

        if ($ipBlackList) {
            Cache::set('ipBlackList', $ipBlackList);
        }

        $visitorToken = Session::get('visitorToken');
        if ($visitorToken) {
            $visitorModel = new Visitor();
            $bool = $visitorModel->updateVisitorByVisitorToken($visitorToken, ['is_black' => 1]);
            if (!$bool) {
                Log::debug('updateVisitor fail!');
            }
        }

        echo $denyMessage;
        exit;
    }

    protected function init_view()
    {
        // 获取小说分类信息
        $categoryList = Session::get('categoryList');
        if (empty($categoryList)) {
            $categoryList = [];
        }
        foreach ($categoryList as &$category) {
            $category['categoryLink'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('categoryList', $categoryList);

        // 友情链接
        $friendLinkModel = new FriendLink();
        $friendLinks = $friendLinkModel->getFriendLinks();
        $this->assign('friendLinks', $friendLinks);

        return ['categoryList' => $categoryList, 'friendLinks' => $friendLinks];
    }
}