<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\home\model\Novel;
use think\facade\Request;

class Chapter extends Common
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
     * 章节列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapters()
    {
        return $this->apiSuccess(0, '查询成功', $chapterList);
    }

    /**
     * 章节详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapter()
    {
        return $this->apiSuccess(0, '查询成功', $chapter);
    }

    /**
     * 修改章节
     * @Author: eps
     */
    public function edit_chapter()
    {

    }
}