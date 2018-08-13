<?php
namespace app\index\controller;

use Jenssegers\Agent\Agent;
use think\Facade\Session;

class Visit extends Common
{
    const TOKEN_SECRET = 'h8hnfoasd1';
    /**
     * 访客访问记录
     * @Author: eps
     * @return \think\response\Json
     */
    public function visitor_log()
    {
        $time = time();
        $year = date('Y', $time);
        $month = date('n', $time);
        $day = date('j', $time);
        $condition = [
            'year' => $year,
            'month' => $month,
            'day' => $day
        ];
        $visitModel = new \app\index\model\Visit();
        $visitRow = $visitModel->where($condition)->find();
        if ($visitRow) {
            // todo: 并发
            $visitModel->where($condition)->update(['visit' => $visitRow->visit + 1]);
            $visit_id = $visitRow['id'];
        } else {
            $date = date('w', $time);
            if ($date == 0) {
                $date = 7;
            }
            $visitData = [
                'year' => $year,
                'month' => $month,
                'day' => $day,
                'date' => $date,
                'visit' => 1
            ];
            $visit_id = $visitModel->insert($visitData, false, true);
        }

        // visitor info
        $ip = getIp();
        $address = trim($_POST['address']);
        if (empty($ip)) {
            return $this->apiError(0, 'ip为空', [$ip]);
        }
        if (empty($address)) {
            return $this->apiError(0, '地址为空', $address);
        }

        $agent = new Agent();
        if ($agent->isDesktop()) {
            $from = 0;
        } else if ($agent->isPhone()) {
            $from = 1;
        }

        $condition = ['visitor_ip' => $ip];
        $visitorModel = new \app\index\model\Visitor();
        $visitor = $visitorModel->where($condition)->find();
        if ($visitor) {
            if ($visitor['is_black']) {
                Session::set('access_denied', 1);
                return $this->apiError(1, '拒绝访问!');
            }
            $visitorModel->where($condition)->update(['last_visit_time' => $time]);
            $visitor['last_visit_time'] = $time;
            $visitorData = $visitor;
        } else {
            $userinfo = Session::get('userinfo');
            $user_id = ($userinfo) ? $userinfo['id'] : 0;

            $visitorData = [
                'visitor_ip' => $ip,
                'visit_id' => $visit_id,
                'user_id' => $user_id,
                'create_time' => $time,
                'from' => $from,
                'place' => $address,
                'is_black' => 0,
                'last_visit_time' => $time,
            ];
            $visitor_id = $visitorModel->insert($visitorData, false, true);
            $visitorData['id'] = $visitor_id;
        }
        Session::set('visitor_info', $visitorData);
        $visitorToken = json_encode($visitorData) . self::TOKEN_SECRET;
        $visitorToken = md5($visitorToken);
        return $this->apiSuccess(1, '访问成功', ['visitor_token' => $visitorToken]);
    }

}
