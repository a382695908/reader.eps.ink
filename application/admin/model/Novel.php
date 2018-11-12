<?php
namespace app\admin\model;

use think\Model;

class Novel extends Model
{
    public function addNovel($data = array())
    {
        $data['create_time'] = time();
        return $this->insert($data, false, true);
    }

    public function getNovelsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'novel_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getNovelByNovelId($novelId)
    {
        $row = $this->where('novel_id', $novelId)->find();
        return (empty($row)) ? [] : $row;
    }

    public function getNovelByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateNovelByNovelId($novelId, $data = array())
    {
        $data['update_time'] = time();
        return $this->update($data, ['novel_id' => $novelId]);
    }

    public function updateNovelByWhere($condition = array(), $data = array())
    {
        $data['update_time'] = time();
        return $this->update($data, $condition);
    }
}
