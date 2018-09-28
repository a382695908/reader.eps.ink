<?php
namespace app\admin\model;

use think\Model;

class Author extends Model
{
    public function getAuthorsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'create_time ASC')
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
        $data['update_time'] = time();
        return $this->update($data, $condition);
    }

    public function addAuthor($data = array())
    {
        $data['create_time'] = time();
        return $this->insert($data, true, true);
    }
}
