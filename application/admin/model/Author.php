<?php
namespace app\admin\model;

use think\Model;

class Author extends Model
{
    public function getAuthorsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'author_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getAuthorByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateAuthorByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }
}
