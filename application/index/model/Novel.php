<?php
namespace app\index\model;

use think\facade\Cache;
use think\Model;

class Novel extends Model
{

    /**
     * getNovelById
     * @Author: eps
     * @param $novelId
     * @return array|null|\PDOStatement|string|Model
     */
    public function getNovelById($novelId)
    {
        $condition = [
            'id' => $novelId,
            'is_end' => 0
        ];
        $row = $this->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    /**
     * getNovelByAuthorId
     * @Author: eps
     * @param $authorId
     * @return array|null|\PDOStatement|string|Model
     */
    public function getNovelByAuthorId($authorId)
    {
        $condition = [
            'author' => $authorId,
            'is_end' => 0
        ];
        $row = $this->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    /**
     * getNovelByAuthorName
     * @Author: eps
     * @param $authorName
     * @return array|null|\PDOStatement|string|Model
     */
    public function getNovelByAuthorName($authorName)
    {
        $authorModel = new Author();
        $author = $authorModel->getAuthorByName($authorName);
        $novels = [];
        if (!empty($author)) {
            $novels = $this->getNovelByAuthorId($author->id);
        }
        return $novels;
    }

    /**
     * getNovelsByCategoryId
     * @Author: eps
     * @param $categoryId
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getNovelsByCategoryId($categoryId)
    {
        $condition = [
            'category' => $categoryId,
            'is_end' => 0
        ];
        $novels = $this->where($condition)->select();
        return (empty($novels)) ? [] : $novels;
    }

    /**
     * getNovelsJoinWithCategory
     * @Author: eps
     * @param array $condition
     * @param string $field
     * @param int $limit
     * @param int $offset
     * @param string $orderBy
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function getAllCategoryNovels($condition = array(), $field = '', $limit = 0, $offset = null, $orderBy = 'novel.clicks DESC')
    {
        if (empty($field)) {
            return false;
        }
        $list = $this->field($field)->alias('novel')->join('category category', 'novel.category = category.id')
            ->where($condition)->limit($limit, $offset)
            ->order($orderBy)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getNovelsByWhere($where = array(), $field = '', $limit = 0, $offset = null, $orderBy = '')
    {

    }

    public function getClosedNovels()
    {

    }

    public function getLatestNovels()
    {

    }

    /**
     * getLatestNovelsByWhere
     * @Author: eps
     * @param array $condition
     * @param string $field
     * @param int $limit
     * @param null $offset
     * @param string $orderBy
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function getLatestNovelsByWhere($condition = array(), $field = '', $limit = 30, $offset = null, $orderBy = 'novel.updatetime DESC')
    {
        if (empty($field)) {
            return false;
        }
        $list = $this->field($field)->alias('novel')
            ->join('author author', 'novel.author = author.id')
            ->join('category category', 'novel.category = category.id')
            ->where($condition)->limit($limit, $offset)
            ->order($orderBy)->select();
        return (empty($list)) ? [] : $list;
    }

    /**
     * getLatestCreatedNovelsByWhere
     * @Author: eps
     * @param array $condition
     * @param string $field
     * @param int $limit
     * @param null $offset
     * @param string $orderBy
     * @return array|bool|\PDOStatement|string|\think\Collection
     */
    public function getLatestCreatedNovelsByWhere($condition = array(), $field = '', $limit = 30, $offset = null, $orderBy = 'novel.createtime DESC')
    {
        if (empty($field)) {
            return false;
        }
        $list = $this->field($field)->alias('novel')
            ->join('author author', 'novel.author = author.id')
            ->join('category category', 'novel.category = category.id')
            ->where($condition)->limit($limit, $offset)
            ->order($orderBy)->select();
        return (empty($list)) ? [] : $list;
    }

    /**
     * getHotestNovels
     * @Author: eps
     * @param string $field
     * @param int $limit
     * @param string $orderBy
     * @return array|mixed|\PDOStatement|string|\think\Collection
     */
    public function getHotestNovels($field = '*', $limit = 4, $orderBy = 'novel.clicks DESC')
    {
        $hotestNovelsCache = Cache::get('hotestNovels');
        if ($hotestNovelsCache) {
            return $hotestNovelsCache;
        } else {
            $condition = [
                'novel.isend' => 0,
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
     * getHotNovels
     * @Author: eps
     * @param string $field
     * @param int $limit
     * @param string $orderBy
     * @return array|mixed|\PDOStatement|string|\think\Collection
     */
    public function getHotNovels($field = '*', $limit = 9, $orderBy = 'novel.clicks DESC')
    {
        $hotNovelsCache = Cache::get('hotNovels');
        if ($hotNovelsCache) {
            return $hotNovelsCache;
        } else {
            $condition = [
                'novel.isend' => 0,
                'novel.ishot' => 1,
                'novel.ishotest' => 0,
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

}
