<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use think\facade\Request;

class FeedBack extends Common
{
    private $req;

    public function __construct()
    {
        parent::__construct();
        $this->req = Request::instance();
        if (!$this->req->isAjax()) {
            return $this->apiError(AppCode::IS_NOT_AJAX);
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