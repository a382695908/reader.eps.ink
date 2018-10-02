<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\home\model\Novel as NovelModel;
use app\admin\model\AppCode;
use think\facade\Request;

class Novel extends Common
{
    private $req;
    private $res;

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
     * 小说列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function novels()
    {
        if ($this->res) {
            return $this->res;
        }

        $novelModel = new NovelModel();
        $where = [];

        // 小说名
        $novelName = $this->req->get('novel_name', '');
        if ($novelName) {
            array_push($where, ['author_name', 'LIKE', "%{$novelName}%"]);
        }
        // 分类id
        $categoryId = intval($this->req->get('category_id', 0));
        if ($categoryId > 0) {
            $where['category_id'] = $categoryId;
        }
        // 作者id
        $authorId = intval($this->req->get('author_id', 0));
        if ($authorId > 0) {
            $where['category_id'] = $authorId;
        }
        // 完本
        $isEnd = intval($this->req->get('is_end', NULL));
        if ($isEnd === 0 || $isEnd === 1) {
            $where['is_end'] = $isEnd;
        }
        // 最热
        $isHotest = intval($this->req->get('is_hotest', NULL));
        if ($isHotest === 0 || $isHotest === 1) {
            $where['is_hotest'] = $isHotest;
        }
        // 热门
        $isHot = intval($this->req->get('is_hot', NULL));
        if ($isHot === 0 || $isHot === 1) {
            $where['is_hot'] = $isHot;
        }
        // 推荐
        $isRecommend = intval($this->req->get('is_recommend', NULL));
        if ($isRecommend === 0 || $isRecommend === 1) {
            $where['is_recommend'] = $isRecommend;
        }
        // 是否下架
        $novelState = intval($this->req->get('state', NULL));
        if ($novelState === 0 || $novelState === 1) {
            $where['novel_state'] = $novelState;
        }
        // 排序
        $sort = intval($this->req->get('sort', 1));
        $orderBy = '';
        switch (abs($sort)) {
            case 1:
                $orderBy = 'novel_id';break;
            case 2:
                $orderBy = 'clicks';break;
            case 3:
                $orderBy = 'reports';break;
            case 4:
                $orderBy = 'collects';break;
            case 5:
                $orderBy = 'recommends';break;
            case 6:
                $orderBy = 'words';break;
        }
        if ($sort > 0) {
            $orderBy .= ' ASC';
        } else {
            $orderBy .= ' DESC';
        }

        // 分页
        $page = intval($this->req->get('page', 1));
        $page = $page > 0 ? $page : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $novelList = $novelModel->getNovelsByWhere($where, '*', $limit, $offset, $orderBy);
        return $this->apiSuccess(AppCode::OK, $novelList);
    }

    /**
     * 小说详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function novel()
    {
        if ($this->res) {
            return $this->res;
        }
        $novelId = intval($this->req->get('novel_id', 0));
        if ($novelId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        $novelModel = new NovelModel();
        $novel = $novelModel->getNovelByNovelId($novelId);
        if (empty($novel)) {
            return $this->apiError(AppCode::NOVEL_IS_NOT_EXISTS);
        }
        $novel['create_time'] = date('Y-m-d H:i:s', $novel['create_time']);
        $novel['update_time'] = date('Y-m-d H:i:s', $novel['update_time']);


        // TODO 章节组

        return $this->apiSuccess(0, '查询成功', $novel);
    }

    /**
     * 编辑小说
     * @Author: eps
     * @return \think\response\Json
     */
    public function edit_novel()
    {
        if ($this->res) {
            return $this->res;
        }
        $novelId = intval($this->req->get('novel_id', 0));
        if ($novelId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        // TODO
        // 1. 修改基本信息
        // 2. 更改分类
        // 3. 更改小说作者
        // 4. 更改小说状态 (最热, 热, 推荐)
    }
}