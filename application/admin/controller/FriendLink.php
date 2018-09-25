<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\home\model\Novel;
use think\facade\Request;

class FriendLink extends Common
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