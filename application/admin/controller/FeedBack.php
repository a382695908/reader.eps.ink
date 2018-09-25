<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\home\model\Novel;
use think\facade\Request;

class FeedBack extends Common
{
    private $req;

    public function __construct()
    {
        parent::__construct();
        $this->req = Request::instance();
        if (!$this->req->isAjax()) {
            return $this->apiError(1, '非ajax请求!');
        }
    }

    /**
     * 反馈意见列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function feedbacks()
    {
        return $this->apiSuccess(0, '查询成功', $feedbackList);
    }

    /**
     * 反馈意见详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function feedback()
    {
        return $this->apiSuccess(0, '查询成功', $feedback);
    }

    /**
     * 修改反馈意见
     * @Author: eps
     */
    public function edit_feedback()
    {

    }
}