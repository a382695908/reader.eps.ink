<?php
namespace app\home\model;

use think\Model;

/**
 * 网站访问
 * @package app\home\model
 */
class Visit extends Model
{

    public function getVisitByYmd($year, $month, $day)
    {
        $condition = [
            'year' => $year,
            'month' => $month,
            'day' => $day
        ];
        $row = $this->where($condition)->find();
        return (!empty($row)) ? $row : [];
    }

    public function setVisitIncByVisitId($visitId, $increment = 1)
    {
        if (intval($visitId) <= 0 || intval($increment) <= 0) {
            return false;
        }
        $bool = $this->where('id', $visitId)->setInc('visit', $increment);
        return $bool;
    }

    public function updateVisitById($visitId, $data = [])
    {
        if (empty($data) || intval($visitId) <= 0) {
            return false;
        }
        $bool = $this->where('id', $visitId)->update($data);
        return $bool;
    }

    public function addVisit($data)
    {
        if (empty($data)) {
            return false;
        }
        $visitId = $this->insert($data);
        return $visitId;
    }

}
