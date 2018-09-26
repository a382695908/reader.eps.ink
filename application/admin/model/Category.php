<?php
namespace app\admin\model;

use think\Model;


class Category extends Model
{
    public function getCategorysByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'category_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getCategoryByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateCategoryByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }
}
