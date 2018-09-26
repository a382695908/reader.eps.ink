<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\admin\model\AppCode;
use think\facade\Request;
use app\admin\model\Chapter as ChapterModel;

class Chapter extends Common
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
     * 章节列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapters()
    {
        $chapterModel = new ChapterModel();
        $chapterList = $chapterModel->getCategorysByWhere();
        return $this->apiSuccess(AppCode::OK, $chapterList);
    }

    /**
     * 章节详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapter()
    {
        $chapterModel = new ChapterModel();
        $chapter = $chapterModel->getCategoryByWhere();
        return $this->apiSuccess(AppCode::OK, $chapter);
    }

    /**
     * 修改章节
     * @Author: eps
     */
    public function edit_chapter()
    {
        $chapterModel = new ChapterModel();
        $bool = $chapterModel->updateCategoryByWhere();
    }
}