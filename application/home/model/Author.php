<?php
namespace app\home\model;

use think\Model;

class Author extends Model
{
    /**
     * 根据作者名查询一条作者记录
     * @Author: eps
     * @param $authorName
     * @return array|null|\PDOStatement|string|Model
     */
    public function getAuthorByAuthorName($authorName)
    {
        $row = $this->where('author_name', $authorName)->find();
        return (empty($row)) ? [] : $row;
    }
}
