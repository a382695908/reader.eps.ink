<?php
namespace app\home\model;

use think\facade\Cache;
use think\Model;

class Novel extends Model
{
    // 是否打开缓存
    const OPEN_CACHE = FALSE;

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
     * 根据条件查询小说
     * @Author: eps
     * @param array $where
     * @param string $fields
     * @return array|null|\PDOStatement|string|Model
     */
    public function getNovelByWhere($where = array(), $fields = '*')
    {
        $row = $this->field($fields)->where($where)->find();
        return (empty($row)) ? [] : $row;
    }

    /**
     * 根据作者ID查询小说
     * @Author: eps
     * @param $authorId
     * @return array|null|\PDOStatement|string|Model
     */
    public function getNovelsByAuthorId($authorId)
    {
        $list = $this->where('author_id', $authorId)->select();
        return (empty($list)) ? [] : $list;
    }

    /**
     * 根据作者名查询小说
     * @Author: eps
     * @param $authorName
     * @return array|null|\PDOStatement|string|Model
     */
    public function getNovelsByAuthorName($authorName)
    {

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
            ->join('category', 'r_novel.category_id = r_category.category_id')
            ->join('author', 'r_novel.author_id = r_author.author_id')
            ->join('chapter', 'r_novel.latest_chapter_id = r_chapter.chapter_id', 'LEFT')
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
    public function getNovelsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset);
        return (empty($list)) ? [] : $list;
    }

    /**
     * TODO 查询所有已完结的小说
     * @Author: eps
     */
    public function getClosedNovels()
    {

    }

    /**
     * 根据条件查询最近更新的小说
     * @Author: eps
     * @param array $where
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function getLatestUpdatedNovelsByWhere($where = array())
    {
        $field = 'r_novel.*, author_name AS authorName, category_name AS categoryName, chapter_name AS chapterName, chapter_id AS chapterId';
        $list = $this->getNovelsByJoin($where, $field, 30, null, 'r_novel.update_time DESC');
        return (empty($list)) ? [] : $list;
    }

    /**
     * 最新入库的小说
     * @Author: eps
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function getLatestCreatedNovelsByWhere($condition = array())
    {
        $field = 'r_novel.*, author_name AS authorName, category_alias AS categoryAlias';
        $list = $this->getNovelsByJoin($condition, $field, 30, null, 'r_novel.create_time DESC');
        return (empty($list)) ? [] : $list;
    }

    /**
     * 最热门小说
     * @Author: eps
     * @param string $field
     * @param int $limit
     * @param string $orderBy
     * @return array|mixed|\PDOStatement|string|\think\Collection
     */
    public function getHotestNovels($field = '*', $limit = 4, $orderBy = 'novel.clicks DESC')
    {
        $hotestNovelsCache = self::OPEN_CACHE ? Cache::get('hotestNovels') : self::OPEN_CACHE;
        if ($hotestNovelsCache) {
            return $hotestNovelsCache;
        } else {
            $condition = [
                'novel.is_end' => 0,
                'novel.ishotest' => 1,
            ];
            $list = $this->field($field)->alias('novel')
                ->join('author author', 'novel.author = author.id')
                ->where($condition)->limit($limit)
                ->order($orderBy)->select();
            Cache::set('hotestNovels', $list);
        }
        return (empty($list)) ? [] : $list;
    }

    /**
     * 热门小说
     * @Author: eps
     * @param string $field
     * @param int $limit
     * @param string $orderBy
     * @return array|mixed|\PDOStatement|string|\think\Collection
     */
    public function getHotNovels($field = '*', $limit = 9, $orderBy = 'novel.clicks DESC')
    {
        $hotNovelsCache = self::OPEN_CACHE ? Cache::get('hotNovels') : self::OPEN_CACHE;
        if ($hotNovelsCache) {
            return $hotNovelsCache;
        } else {
            $condition = [
                'novel.is_end' => 0,
                'novel.ishot' => 1,
            ];

            $list = $this->field($field)->alias('novel')
                ->join('author author', 'novel.author = author.id')
                ->join('category category', 'novel.category = category.id')
                ->where($condition)->limit($limit)
                ->order($orderBy)->select();
            Cache::set('hotNovels', $list);
        }
        return (empty($list)) ? [] : $list;
    }

    // === BackStage Method ===
    public function addNovel($data = array())
    {

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
