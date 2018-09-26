<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use think\facade\Request;

class FriendLink extends Common
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
     * 分类列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function friendLinks()
    {
        return $this->apiSuccess(0, '查询成功', $friendLinkList);
    }

    /**
     * 分类详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function friendLink()
    {
        return $this->apiSuccess(0, '查询成功', $friendLink);
    }

    /**
     * 修改分类
     * @Author: eps
     */
    public function edit_friendLink()
    {

    }
}