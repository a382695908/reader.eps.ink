<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use think\facade\Request;

class User extends Common
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
     * 用户列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function users()
    {
        return $this->apiSuccess(0, '查询成功', $userList);
    }

    /**
     * 用户详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function user()
    {
        return $this->apiSuccess(0, '查询成功', $user);
    }

    /**
     * 修改用户
     * @Author: eps
     */
    public function edit_user()
    {

    }
}