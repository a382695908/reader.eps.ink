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
