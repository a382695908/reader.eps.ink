<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\home\model\Novel;
use think\facade\Request;

class User extends Common
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