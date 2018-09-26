<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\admin\model\AppCode;
use think\facade\Request;

class ChapterGroup extends Common
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
     * 章节组列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapter_groups()
    {
        return $this->apiSuccess(0, '查询成功', $chapterGroupList);
    }

    /**
     * 章节组详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapter_group()
    {
        return $this->apiSuccess(0, '查询成功', $chapterGroup);
    }

    /**
     * 修改章节组
     * @Author: eps
     */
    public function edit_chapter_group()
    {

    }
}