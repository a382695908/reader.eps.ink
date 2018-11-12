<?php
namespace app\admin\model;

use think\Model;

class Author extends Model
{
    /**
     * 根据条件查询一组作者记录
     * @Author: eps
     * @param array $condition
     * @param string $field
     * @param int $limit
     * @param null $offset
     * @param string $orderBy
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getAuthorsByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'create_time ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    /**
     * 根据条件查询一条作者记录
     * @Author: eps
     * @param array $condition
     * @param string $field
     * @return array|null|\PDOStatement|string|Model
     */
    public function getAuthorByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    /**
     * 根据条件更新一条作者记录
     * @Author: eps
     * @param array $condition
     * @param array $data
     * @return static
     */
    public function updateAuthorByWhere($condition = array(), $data = array())
    {
        $data['update_time'] = time();
        return $this->update($data, $condition);
    }

    /**
     * 添加新作者
     * @Author: eps
     * @param array $data
     * @return int|string
     */
    public function addAuthor($data = array())
    {
        $data['create_time'] = time();
        return $this->insert($data, false, true);
    }
}
