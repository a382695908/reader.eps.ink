<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\home\model\Novel;
use think\facade\Request;

class Author extends Common
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
     * 作者列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function authors()
    {
        return $this->apiSuccess(0, '查询成功', $authorList);
    }

    /**
     * 作者详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function author()
    {
        return $this->apiSuccess(0, '查询成功', $author);
    }

    /**
     * 修改作者
     * @Author: eps
     */
    public function edit_author()
    {

    }
}