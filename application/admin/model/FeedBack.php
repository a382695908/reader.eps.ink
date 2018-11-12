<?php
namespace app\admin\model;

use think\Model;

/**
 * 反馈
 * @package app\home\model
 */
class FeedBack extends Model
{

    public function getFeedBacksByWhere($condition = array(), $field = '*', $limit = 0, $offset = null, $orderBy = 'feedback_id ASC')
    {
        $list = $this->field($field)->where($condition)->order($orderBy)->limit($limit, $offset)->select();
        return (empty($list)) ? [] : $list;
    }

    public function getFeedBackByWhere($condition = array(), $field = '*')
    {
        $row = $this->field($field)->where($condition)->find();
        return (empty($row)) ? [] : $row;
    }

    public function updateFeedBackByWhere($condition = array(), $data = array())
    {
        return $this->update($data, $condition);
    }
}
