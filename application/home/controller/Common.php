<?php
/**
 * NAME: Common.php
 * Author: eps
 * DateTime: 7/18/2018 10:01 PM
 */

namespace app\home\controller;

use app\home\model\Category;
use app\home\model\FriendLink;
use app\home\model\Visit;
use app\home\model\Visitor;
use Jenssegers\Agent\Agent;
use think\Controller;
use think\facade\Cache;
use think\facade\Log;
use think\facade\Session;

class Common extends Controller
{
    // 机器人请求限制
    const ROBOT_REQUEST_TIMES = 50;
    const ROBOT_REQUEST_INTERVAL = 30;

    // 正常请求限制
    const REQUEST_TIMES = 100;
    const REQUEST_INTERVAL = 60;

    // 是否打开缓存
    const OPEN_CACHE = false;

    // 构造方法
    public function __construct()
    {
        parent::__construct();
        $time = time();
        $requestIp = get_ip();

        // 黑名单ip
        $this->checkIsBlack($requestIp);

        // 请求限制
        $agent = new Agent();
        $this->checkReqestLimit($agent, $time, $requestIp);

        // 如果是手机 转到手机域名
        if ($agent->isPhone()) {
            echo '你是手机请求, 应当跳转';
            // TODO: header(localtion:
        }

        $this->doSiteVisit($time);

        $this->doSiteVisitor($requestIp, $agent, $time);

        $this->initSession();
    }

    // ----------  同包方法 ----------

    /**
     * API响应成功
     * @Author: eps
     * @param $code
     * @param $message
     * @param array $data
     * @return \think\response\Json
     */
    protected function apiSuccess($code, $message, $data = [])
    {
        $responseData = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        return json($responseData);
    }

    /**
     * API响应错误
     * @Author: eps
     * @param $code
     * @param $message
     * @param array $data
     * @return \think\response\Json
     */
    protected function apiError($code, $message, $data = [])
    {
        $responseData = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        return json($responseData);
    }

    /**
     * 设置拒绝访问
     * @Author: eps
     * @param null $ipBlackList
     * @param string $denyMessage
     */
    protected function setAccessDeny($ipBlackList = null, $denyMessage = 'ACCESS DENY')
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

    /**
     * 初始化前台页面的数据
     * @Author: eps
     * @return array
     */
    protected function init_view()
    {
        // 获取小说分类信息
        $categoryList = Session::get('categoryList');
        if (empty($categoryList)) {
            $categoryList = [];
        }
        foreach ($categoryList as &$category) {
            $category['categoryLink'] = url('/category/' . $category['category_id']);
        }
        unset($category);
        $this->assign('categoryList', $categoryList);

        // 友情链接
        $friendLinkModel = new FriendLink();
        $friendLinks = $friendLinkModel->getFriendLinks();
        $this->assign('friendLinks', $friendLinks);

        $this->assign('header', '读读读');

        return ['categoryList' => $categoryList, 'friendLinks' => $friendLinks];
    }

    // ----------  私有方法 ----------

    /**
     * Session 初始化
     * @Author: eps
     */
    private function initSession()
    {
        if (!Session::get('categoryList')) {
            $categoryModel = new Category();
            $categoryList = $categoryModel->getCategorys()->toArray();
            Session::set('categoryList', $categoryList);
        }
    }

    /**
     * 检查请求是否是黑名单
     * @Author: eps
     * @param $requestIp
     */
    private function checkIsBlack($requestIp)
    {
        if (Session::get('assessDenied') == 1) {
            echo 'DENY YOU o_O!';
        }

        $ipBlackList = Session::get('ipBlackList');

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
    }

    /**
     * 检查请求限制
     * @Author: eps
     * @param $agent
     * @param $time
     * @param $requestIp
     */
    private function checkReqestLimit($agent, $time, $requestIp)
    {
        // 请求限制
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
    }

    /**
     * 处理网站访问信息
     * @Author: eps
     * @param $time
     */
    private function doSiteVisit($time)
    {
        // 构造访问数据
        $year = date('Y', $time);
        $month = date('n', $time);
        $day = date('j', $time);
        // 查询今天是否有访问网站记录
        $visitModel = new Visit();
        $visitInfo = $visitModel->getVisitByYmd($year, $month, $day);
        $visitId = 0;
        // 如果有, 做一次更新
        if ($visitInfo) {
            $visitId = $visitInfo->id;
            $bool = $visitModel->setVisitIncByVisitId($visitId, 1);
            if (!$bool) {
                Log::debug('setVisitInc fail!');
            }
        } else {
            // 如果没有, 插入一条新纪录
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
    }

    /**
     * 处理网站访客信息
     * @Author: eps
     * @param $requestIp
     * @param $agent
     * @param $time
     */
    private function doSiteVisitor($requestIp, $agent, $time)
    {
        // 收集请求信息
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
                'is_phone' => $agent->isPhone() ? 1 : 0,
                'is_desktop' => $agent->isDesktop() ? 1 : 0,
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
    }
}