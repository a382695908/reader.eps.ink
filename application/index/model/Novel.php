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

    public function getNovelsByJoin($table = array())
    {

    }

    public function getNovelsByWhere()
    {

    }

    public function getClosedNovels()
    {

    }

    public function getLatestNovels()
    {

    }

    public function getLatestNovelsByCategoryId()
    {

    }

    public function getLatestCreatedNovelsByCategoryId()
    {

    }

    public function getHotestNovels($limit = 4)
    {
        $hotestNovelsCache = Cache::get('hotestNovels');
        if ($hotestNovelsCache) {
            return $hotestNovelsCache;
        } else {
            $condition = [
                'n.isend' => 0,
                'n.ishotest' => 1,
            ];
            $list = $this->alias('n')->join('author a', 'n.author = a.id')->where($condition)->limit($limit)->select();
            Cache::set('hotestNovels', $list);
        }
        return (empty($list)) ? [] : $list;
    }

    public function getHotNovels($limit = 9)
    {
        $hotNovelsCache = Cache::get('hotestNovels');
        if ($hotNovelsCache) {
            return $hotNovelsCache;
        } else {
            $condition = [
                'n.isend' => 0,
                'n.ishot' => 1,
                'n.ishotest' => 0,
            ];

            $list = $this->alias('n')
                ->join('author a', 'n.author = a.id')
                ->join('category c', 'n.category = c.id')
                ->where($condition)->limit($limit)->select();
            Cache::set('hotNovels', $list);
        }
        return (empty($list)) ? [] : $list;
    }

}
