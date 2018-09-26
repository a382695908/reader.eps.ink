<?php
namespace app\admin\model;

use think\Model;

/**
 * 网站访客
 * @package app\home\model
 */
class Visitor extends Model
{
    public function getVisitorsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getVisitorByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateVisitorByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }
}
