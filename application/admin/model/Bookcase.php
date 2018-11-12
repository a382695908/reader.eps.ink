<?php
namespace app\admin\model;

use think\Model;

class Bookcase extends Model
{
    public function getBookcasesByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'bookcase_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getBookcaseByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateBookcaseByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }
}
