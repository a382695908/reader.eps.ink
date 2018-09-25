<?php
namespace app\home\model;

use think\Model;

class Novel extends Model
{
    /**
     * 根据小说ID查询小说
     * @Author: eps
     * @param $novelId
     * @return array|null|\PDOStatement|string|Model
     */
    public function getNovelByNovelId($novelId)
    {
        $row = $this->where('novel_id', $novelId)->find();
        return (empty($row)) ? [] : $row;
    }

    /**
     * 根据分类ID查询小说
     * @Author: eps
     * @param $categoryId
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getNovelsByCategoryId($categoryId)
    {
        $novels = $this->where('category_id', $categoryId)->select();
        return (empty($novels)) ? [] : $novels;
    }

    /**
     * 通过联结分类表和作者表查询小说
     * @Author: eps
     * @param array $condition
     * @param string $field
     * @param int $limit
     * @param int $offset
     * @param string $orderBy
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function getNovelsByJoin($condition = array(), $field = '', $limit = 0, $offset = null, $orderBy = 'r_novel.clicks DESC')
    {
        if (empty($field)) {
            return false;
        }
        $list = $this->field($field)
            ->join('r_category', 'r_novel.category_id = r_category.category_id')
            ->join('r_author', 'r_novel.author_id = r_author.author_id')
            ->join('r_chapter', 'r_novel.latest_chapter_id = r_chapter.chapter_id', 'LEFT')
            ->where($condition)->limit($limit, $offset)
            ->order($orderBy)->select();
        return (empty($list)) ? [] : $list;
    }

    /**
     * 根据条件查询小说
     * @Author: eps
     * @param array $condition
     * @param string $field
     * @param int $limit
     * @param null $offset
     * @param string $orderBy
     * @return $this|array
     */
    public function getNovelsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'novel_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getNovelByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    /**
     * 根据条件查询最近更新的小说
     * @Author: eps
     * @param array $condition
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function getLatestUpdatedNovelsByWhere($condition = array(), $limit = 30, $offset = NULL)
    {
        $list = $this->getNovelsByJoin($condition, 'r_novel.*,author_name AS authorName,category_name AS categoryName,chapter_name AS chapterName,chapter_id AS chapterId', $limit, $offset, 'r_novel.update_time DESC');
        return (empty($list)) ? [] : $list;
    }

    /**
     * 根据条件查询小说的数量
     * @Author: eps
     * @param array $condition
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function countNovelsByWhere($condition = array())
    {
        $number = $this->where($condition)->count('novel_id');
        return $number;
    }

    /**
     * 最新入库的小说
     * @Author: eps
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function getLatestCreatedNovelsByWhere($condition = array())
    {
        return $this->getNovelsByJoin(
            $condition,
            'r_novel.*,author_name AS authorName,category_alias AS categoryAlias',
            30,
            null, 'r_novel.create_time DESC');
    }

    /**
     * 查询最热门小说
     * @Author: eps
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getHotestNovels()
    {
        return $this->getNovelsByJoin(['is_end' => 0, 'is_hotest' => 1], 'r_novel.*,author_name AS authorName', 4, 0, 'clicks DESC');
    }

    /**
     * 查询热门小说
     * @Author: eps
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function getHotNovels()
    {
        return $this->getNovelsByJoin(['is_end' => 0, 'is_hot' => 1], 'r_novel.*,author_name AS authorName,category_alias AS categoryAlias', 9, 0, 'clicks DESC');
    }

    // === BackStage Method ===
    public function addNovel($data = array())
    {
        $data['create_time'] = time();
        return $this->insert($data, true, true);
    }

    public function updateNovel($data = array(), $where = array()) {
        $data['update_time'] = time();
        return $this->update($data, $where);
    }

    public function updateNovelById($authorId, $data = array())
    {

    }

    public function updateNovelByName($authorName, $data = array())
    {

    }

    public function deleteNovelById($authorId)
    {

    }

    public function deleteNovelsByWhere($condition = array())
    {

    }
}
