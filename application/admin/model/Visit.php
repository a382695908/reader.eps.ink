<?php
namespace app\admin\model;

use think\Model;

/**
 * 网站访问
 * @package app\home\model
 */
class Visit extends Model
{
    public function getVisitsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getVisitByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateVisitByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }
}
