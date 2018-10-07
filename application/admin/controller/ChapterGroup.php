<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use app\admin\model\ChapterGroup as ChapterGroupModel;
use think\facade\Request;

class ChapterGroup extends Common
{
    private $req;

    public function __construct()
    {
        parent::__construct();
        $this->req = Request::instance();
        if (!$this->req->isAjax()) {
            $this->res = $this->apiError(AppCode::REQUEST_IS_NOT_AJAX);
            return;
        }
        $this->res = $this->checkValidToken(
            $this->req->get('user_token') ?: $this->req->post('user_token'),
            $this->req->get('login_time') ?: $this->req->post('login_time')
        );
    }

    /**
     * 章节组列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapter_groups()
    {
        if ($this->res) {
            return $this->res;
        }
        $novelId = intval($this->req->get('novel_id', 0));
        if ($novelId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        // 分页
        $page = intval($this->req->get('page', 1));
        $page = $page > 0 ? $page : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $chapterGroupModel = new ChapterGroupModel();
        $where = ['novel_id' => $novelId];
        $chapterGroupList = $chapterGroupModel->getChapterGroupsByWhere($where, '*', $limit, $offset);

        return $this->apiSuccess(AppCode::OK, $chapterGroupList);
    }

    /**
     * 章节组详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapter_group()
    {
        if ($this->res) {
            return $this->res;
        }
        $chapterGroupId = intval($this->req->get('chapter_group_id', 0));
        if ($chapterGroupId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        $chapterGroupModel = new ChapterGroupModel();
        $where = ['chapter_group_id' => $chapterGroupId];
        $chapterGroup = $chapterGroupModel->getChapterGroupByWhere($where);
        $novel['create_time'] = date('Y-m-d H:i:s', $chapterGroup['create_time']);

        return $this->apiSuccess(AppCode::OK, $chapterGroup);
    }

    /**
     * 修改章节组
     * @Author: eps
     */
    public function edit_chapter_group()
    {

    }

    /**
     * 检查章节组名是否唯一
     * @Author: eps
     */
    public function check_chapter_group_name()
    {

    }

    /**
     * 添加章节组
     * @Author: eps
     */
    public function add_chapter_group()
    {

    }


}