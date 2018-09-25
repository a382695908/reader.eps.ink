<?php
namespace app\home\model;

use think\Model;

class Chapter extends Model
{

    /**
     * 根据章节ID查询章节
     * @Author: eps
     * @param $chapterId
     * @return array|null|\PDOStatement|string|Model
     */
    public function getChapterByChapterId($chapterId)
    {
        $row = $this->where('chapter_id', $chapterId)->find();
        return empty($row) ? [] : $row;
    }

    /**
     * 根据章节ID查询章节名
     * @Author: eps
     * @param $chapterId
     * @return mixed|string
     */
    public function getChapterNameByChapterId($chapterId)
    {
        $row = $this->where('chapter_id', $chapterId)->find();
        return empty($row) ? '' : $row['chapter_name'];
    }

    /**
     * 根据条件查询章节
     * @Author: eps
     * @param array $condition
     * @param string $fields
     * @param int $limit
     * @param null $offset
     * @param string $orderBy
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getChaptersByWhere($condition = array(), $fields = '*', $limit = 0, $offset = null, $orderBy = 'sort ASC')
    {
        $list = $this->field($fields)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return empty($list) ? [] : $list;
    }


    public function getChaptersByChapterGroupId($chapterGroupId, $field = '*', $limit = 0, $offset = null, $orderBy = 'sort ASC')
    {

    }

    public function getChaptersLikeName($name = '', $field = '*', $limit = 0, $offset = null, $orderBy = 'sort ASC')
    {

    }
    
}
