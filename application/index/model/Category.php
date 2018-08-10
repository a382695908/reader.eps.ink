<?php
namespace app\index\model;

use think\facade\Cache;
use think\Model;

class Category extends Model
{
    /**
     * getCategorys
     * @Author: eps
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getCategorys()
    {
        $categoryListCache = Cache::get('categoryList');
        if ($categoryListCache) {
            return $categoryListCache;
        } else {
            $list = $this->select();
            Cache::set('categoryList', $categoryListCache, 3600);
        }
        return (empty($list)) ? [] : $list;
    }

    /**
     * getCategoryById
     * @Author: eps
     * @param $categoryId
     * @return array|null|\PDOStatement|string|Model
     */
    public function getCategoryById($categoryId)
    {
        $condition = [
            'id' => $categoryId
        ];
        $row = $this->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    /**
     * getCategoryByAlias
     * @Author: eps
     * @param $categoryAlias
     * @return array|null|\PDOStatement|string|Model
     */
    public function getCategoryByAlias($categoryAlias)
    {
        $condition = [
            'alias' => $categoryAlias
        ];
        $row = $this->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    /**
     * getCategoryByName
     * @Author: eps
     * @param $categoryName
     * @return array|null|\PDOStatement|string|Model
     */
    public function getCategoryByName($categoryName)
    {
        $condition = [
            'name' => $categoryName
        ];
        $row = $this->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }
}
