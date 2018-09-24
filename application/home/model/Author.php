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

    /**
     * 根据作者id查询一条作者记录
     * @Author: eps
     * @param $authorId
     * @return array|null|\PDOStatement|string|Model
     */
    public function getAuthorByAuthorId($authorId)
    {
        $row = $this->where('author_id', $authorId)->find();
        return (empty($row)) ? [] : $row;
    }

    public function getAuthorsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = '')
    {

    }

    public function getAuthorsLikeName($name = '', $field = '*', $limit = 0, $offset = null, $orderBy = '')
    {

    }


    // === BackStage Method ===

    public function addAuthor($data = array())
    {

    }

    public function addAuthors($data = array())
    {

    }

    public function updateAuthorById($authorId, $data = array())
    {

    }

    public function updateAuthorByName($authorName, $data = array())
    {

    }

    public function deleteAuthorById($authorId)
    {

    }

    public function deleteAuthorsByWhere($condition = array())
    {

    }
}
