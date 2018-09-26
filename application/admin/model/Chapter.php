<?php
namespace app\admin\model;

use think\Model;

class Chapter extends Model
{
    public function getChaptersByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'chapter_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getChapterByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateChapterByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }
}
