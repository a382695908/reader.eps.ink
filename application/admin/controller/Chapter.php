<?php

namespace app\admin\controller;

use app\admin\model\AppCode;
use app\admin\model\Novel;
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
            $this->res = $this->apiError(AppCode::REQUEST_IS_NOT_AJAX);
            return;
        }
        $this->res = $this->checkValidToken(
            $this->req->get('user_token') ?: $this->req->post('user_token'),
            $this->req->get('login_time') ?: $this->req->post('login_time')
        );
    }

    /**
     * 章节列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapters()
    {
        if ($this->res) {
            return $this->res;
        }
        $page = $this->req->get('page', 1);
        $authorId = $this->req->get('author_id', 0);
        $novelId = $this->req->get('novel_id', 0);
        $chapterName = $this->req->get('chapter_name', '');
        $chapterGroupId = $this->req->get('chapter_group_id', 0);
        $sort = $this->req->get('sort', 9);

        $where = [];
        if ($authorId > 0) {
            $where['author_id'] = $authorId;
        }
        if ($novelId > 0) {
            $where['novel_id'] = $novelId;
        }
        if ($chapterName) {
            $where['chapter_name'] = $chapterName;
        }
        if ($chapterGroupId > 0) {
            $where['chapter_group_id'] = $chapterGroupId;
        }

        $sortFields = [
            1 => 'chapter_id',
            2 => 'chapter_group_id',
            3 => 'author_id',
            4 => 'clicks',
            5 => 'reports',
            6 => 'words',
            7 => 'create_time',
            8 => 'update_time',
            9 => 'sort',
        ];
        $orderBy = $sortFields[abs($sort)] . ($sort > 0 ? ' ASC' : ' DESC');

        $chapterModel = new ChapterModel();
        $limit = 20;
        $offset = ($page - 1) * $limit;
        $chapterList = $chapterModel->getChaptersByWhere($where, '*', $limit, $offset, $orderBy);
        return $this->apiSuccess(AppCode::OK, $chapterList);
    }

    /**
     * 章节详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function chapter()
    {
        if ($this->res) {
            return $this->res;
        }
        $chapterId = $this->req->get('chapter_id');
        $where = [
            'chapter_id' => $chapterId
        ];
        $chapterModel = new ChapterModel();
        $chapter = $chapterModel->getChapterByWhere($where, '*');
        return $this->apiSuccess(AppCode::OK, $chapter);
    }

    /**
     * 修改章节
     * @Author: eps
     */
    public function edit_chapter()
    {
        if ($this->res) {
            return $this->res;
        }
        $chapterId = $this->req->post('chapter_id', 0);
        if ($chapterId < 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $data = [];

        $chapterName = $this->req->post('chapter_name', '');
        if ($chapterName) {
            $data['chapter_name'] = $chapterName;
        }

        $content = $this->req->post('content', '');
        if ($content) {
            $data['content'] = $content;
        }

        $chapterGroupId = $this->req->post('chapter_group_id', 0);
        if ($chapterGroupId > 0) {
            $data['chapter_group_id'] = $chapterGroupId;
        }

        $where = [
            'chapter_id' => $chapterId
        ];
        $chapterModel = new ChapterModel();
        $bool = $chapterModel->updateChapterByWhere($where, $data);
        if (!$bool) {
            return $this->apiError(AppCode::UPDATE_FAIL);
        }
        return $this->apiSuccess(AppCode::UPDATE_OK);
    }

    public function add_chapter()
    {
        if ($this->res) {
            return $this->res;
        }
        $novelId = $this->req->post('novel_id', 0);
        $chapterGroupId = $this->req->post('chapter_group_id', 0);
        $chapterName = $this->req->post('chapter_name', '');
        $content = $this->req->post('content', '');

        if ($novelId < 1 || $chapterGroupId < 1 || !$chapterName || !$content) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $novelModel = new Novel();
        $novel = $novelModel->getNovelByWhere(['novel_id' => $novelId]);

        $data = [
            'novel_id'         => $novelId,
            'chapter_group_id' => $chapterGroupId,
            'author_id'        => $novel['author_id'],
            'chapter_name'     => $chapterName,
            'content'          => $content
        ];

        $chapterModel = new ChapterModel();
        $chapterId = $chapterModel->addChapter($data);
        if (!$chapterId) {
            return $this->apiError(AppCode::INSERT_FAIL);
        }
        return $this->apiSuccess(AppCode::INSERT_OK);
    }
}