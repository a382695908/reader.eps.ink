<?php
namespace app\index\model;

use think\Model;

class Author extends Model
{

    /**
     * getAuthorByName
     * @Author: eps
     * @param $authorName
     * @return array|null|\PDOStatement|string|Model
     */
    public function getAuthorByName($authorName)
    {
        $condition = [
            'name' => $authorName
        ];
        $row = $this->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    /**
     * getAuthorById
     * @Author: eps
     * @param $authorId
     * @return array|null|\PDOStatement|string|Model
     */
    public function getAuthorById($authorId)
    {
        $condition = [
            'id' => $authorId
        ];
        $row = $this->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }
}
