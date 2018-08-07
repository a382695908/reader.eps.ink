<?php
namespace app\index\controller;

use Jenssegers\Agent\Agent;
use think\Facade\Session;

class Visit extends Common
{
    /**
     * 访客访问记录
     * @Author: eps
     * @return \think\response\Json
     */
    public function visitor_log() {
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
            // todo; update field `visit`
            $visit_id = $visitRow['id'];
        }
        else {
            // todo: insert into visit
            $date = date('w', $time);
            if ($date == 0) {
                $date = 7;
            }
        }

        // user base info
        $visitor_info = $_POST['info'];
        $visitor_info = json_decode($visitor_info, true);
        $ip = $visitor_info['ip'];
        $address = $visitor_info['address'];

        $agent = new Agent();
        if ($agent->isDesktop()) {
            $from = 0;
        }
        else if ($agent->isPhone()) {
            $from = 1;
        }

        $condition = [
            'visitor_ip' => $ip,
        ];
        $visitorModel = new \app\index\model\Visitor();
        $visitor = $visitorModel->where($condition)->find();
        if ($visitor) {

            if ($visitor['is_black']) {
                Session::set('access_denied', 1);
                die;
            }
            // update field `last_visit_time`
            $visitorModel->where($condition)->save(['last_visit_time' => $time]);
            $visitor['last_visit_time'] = $time;
            $visitorData  = $visitor;
        }
        else {
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
            $visitor_id = $visitorModel->save($visitorData);
            $visitorData['id'] = $visitor_id;
        }
        Session::set('visitor_info', $visitorData);
        return $this->apiSuccess(1, '访问成功');
    }

}
