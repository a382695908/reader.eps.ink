<?php
namespace app\admin\model;

use think\Model;

class User extends Model
{
    public function getUsersByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'user_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getUserByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateUserByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }
}
