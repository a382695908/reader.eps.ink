<?php
namespace app\home\model;

use think\Model;

class ChapterGroup extends Model
{
    public function getChapterGroupById()
    {

    }

    public function getChaptersByName()
    {

    }

    public function getChaptersLikeName()
    {

    }

    public function getChapterGroupByNovelId()
    {

    }

    /**
     * 根据条件查询章节组
     * @Author: eps
     * @param array $where
     * @param string $fields
     * @param int $limit
     * @param int $offset
     * @param string $orderBy
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getChapterGroupsByWhere($where = array(), $fields = '*', $limit = 0, $offset = 0, $orderBy = 'sort ASC')
    {
        $list = $this->field($fields)->where($where)->order($orderBy)->limit($limit, $offset)->select();
        return empty($list) ? [] : $list;
    }

    // === BackStage Method ===
    public function addChapterGroup($data)
    {

    }

    public function updateChapterGroup($data = array())
    {

    }

    public function deleteChapterGroupByChapterGroupId($chapterGroupId)
    {

    }


}
