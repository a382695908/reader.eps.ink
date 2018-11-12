<?php
namespace app\admin\model;

use think\Model;

/**
 * 友情链接
 * @package app\home\model
 */
class FriendLink extends Model
{
    public function getFriendLinksByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'friend_link_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getFriendLinkByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateFriendLinkByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }
}