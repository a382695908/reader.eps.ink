<?php
/**
 * NAME: FriendLink.php
 * Author: eps
 * DateTime: 8/6/2018 10:26 PM
 */
namespace app\index\model;

use think\Model;

/**
 * 友情链接
 * @package app\index\model
 */
class FriendLink extends Model
{
    /**
     * getFriendLinks
     * @Author: eps
     * @return array|\PDOStatement|string|\think\Collection
     */
    public function getFriendLinks()
    {
        $list = $this->select();
        return (empty($list)) ? [] : $list;
    }

    // === BackStage Method ===
    public function addFriendLink($data = array())
    {

    }

    public function updateFriendLinkById($authorId, $data = array())
    {

    }

    public function deleteFriendLinkById($authorId)
    {

    }

    public function deleteFriendLinksByWhere($condition = array())
    {

    }
}