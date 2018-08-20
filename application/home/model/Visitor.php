<?php
namespace app\index\model;

use think\Model;

/**
 * 网站访客
 * @package app\index\model
 */
class Visitor extends Model
{
    public function updateVisitorByVisitorToken($visitorToken, $data = array())
    {
        if (empty($data) || empty($visitorToken)) {
            return false;
        }
        $bool = $this->where('visitor_token', $visitorToken)->update($data);
        return $bool;
    }

    public function setVisitIncByVisitorToken($visitorToken, $increment = 1)
    {
        if (empty($visitorToken) || intval($increment) <= 0) {
            return false;
        }
        $bool = $this->where('visitor_token', $visitorToken)->setInc('visit', $increment);
        return $bool;
    }

    public function getVisitorByIp($ip)
    {
        if (empty($ip)) {
            return false;
        }
        $visitor = $this->where('ip', $ip)->find();
        return (!empty($visitor)) ? $visitor : [];
    }

    public function addVisitor($data)
    {
        if (empty($data)) {
            return false;
        }
        $visitorId = $this->insert($data);
        return $visitorId;
    }
}
