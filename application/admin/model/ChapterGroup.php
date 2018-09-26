<?php
namespace app\admin\model;

use think\Model;

class ChapterGroup extends Model
{
    public function getChapterGroupsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'chapter_group_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getChapterGroupByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateChapterGroupByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }

}
