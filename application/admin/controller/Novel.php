<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\admin\model\Author;
use app\admin\model\Novel as NovelModel;
use app\admin\model\AppCode;
use app\admin\model\Category;
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
                $orderBy = 'novel_id';
                break;
            case 2:
                $orderBy = 'clicks';
                break;
            case 3:
                $orderBy = 'reports';
                break;
            case 4:
                $orderBy = 'collects';
                break;
            case 5:
                $orderBy = 'recommends';
                break;
            case 6:
                $orderBy = 'words';
                break;
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
        $novelId = intval($this->req->post('novel_id', 0));
        if ($novelId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $novelModel = new NovelModel();
        $novel = $novelModel->getNovelByNovelId($novelId);
        if (empty($novel)) {
            return $this->apiError(AppCode::NOVEL_IS_NOT_EXISTS);
        }

        // 更新数据
        $data = [];

        // 作者
        $authorId = intval($this->req->post('author_id', 0));
        if ($authorId > 0) {
            $authorModel = new Author();
            $author = $authorModel->getAuthorByWhere(['author_id' => $authorId]);
            if (empty($author)) {
                return $this->apiError(AppCode::AUTHOR_IS_NOT_EXISTS);
            }
            $data['author_id'] = $authorId;
        }

        // 分类
        $categoryId = intval($this->req->post('category_id', 0));
        if ($categoryId > 0) {
            $categoryModel = new Category();
            $category = $categoryModel->getCategoryByWhere(['category_id' => $categoryId]);
            if (empty($category)) {
                return $this->apiError(AppCode::CATEGORY_IS_NOT_EXISTS);
            }
            $data['category_id'] = $categoryId;
        }

        // 小说名
        $novelName = $this->req->post('novel_name', '');
        if (!empty($novelName) && mb_strlen($novelName) < 40) {
            $novel = $novelModel->getNovelByWhere(['novel_name' => $novelName]);
            if (!empty($novel)) {
                return $this->apiError(AppCode::NOVEL_NAME_IS_EXISTS);
            }
            $data['novel_name'] = $novelName;
        }

        // 封面
        $cover = $this->req->post('cover', '');
        if (!empty($cover)) {
            // TODO 检查是合格的url
            $data['cover'] = $cover;
        }

        // 小说介绍
        $introduction = $this->req->post('introduction', '');
        if (!empty($introduction) && mb_strlen($introduction) <= 120) {
            $data['introduction'] = $introduction;
        }

        $bool = $novelModel->updateNovelByNovelId($novelId, $data);
        if (!$bool) {
            return $this->apiError(AppCode::UPDATE_FAIL);
        }
        return $this->apiSuccess(AppCode::UPDATE_OK);
    }

    /**
     * 切换小说状态
     * @Author: eps
     */
    public function toggle_novel_state()
    {
        if ($this->res) {
            return $this->res;
        }
        $novelId = intval($this->req->post('novel_id', 0));
        $type = $this->req->post('type', 0);
        if ($novelId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        if ($type < 1 || $type > 5) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $novelModel = new NovelModel();
        $novel = $novelModel->getNovelByNovelId($novelId);
        if (empty($novel)) {
            return $this->apiError(AppCode::NOVEL_IS_NOT_EXISTS);
        }

        $data = [];
        switch ($type) {
            case 1:
                $data['is_hotest'] = 1 - $novel['is_hotest'];
                break;
            case 2:
                $data['is_hot'] = 1 - $novel['is_hot'];
                break;
            case 3:
                $data['is_recommend'] = 1 - $novel['is_recommend'];
                break;
            case 4:
                $data['is_end'] = 1 - $novel['is_end'];
                break;
            case 5:
                $data['novel_state'] = 1 - $novel['novel_state'];
                break;
        }
        $bool = $novelModel->updateNovelByNovelId($novelId, $data);
        if (!$bool) {
            return $this->apiError(AppCode::UPDATE_FAIL);
        }
        return $this->apiSuccess(AppCode::UPDATE_OK);
    }

    /**
     * 检查小说名是否唯一
     * @Author: eps
     */
    public function check_novel_name()
    {
        if ($this->res) {
            return $this->res;
        }
        $novelName = $this->req->get('novel_name', '');
        if (empty($novelName)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $novelModel = new NovelModel();
        $where = ['novel_name' => $novelName];
        $novel = $novelModel->getNovelByWhere($where);
        if (!empty($novel)) {
            return $this->apiError(AppCode::NOVEL_NAME_IS_EXISTS);
        }
        return $this->apiSuccess(AppCode::NOVEL_NAME_IS_NOT_EXISTS);
    }

    /**
     * 添加小说
     * @Author: eps
     */
    public function add_novel()
    {
        if ($this->res) {
            return $this->res;
        }
        $novelId = intval($this->req->post('novel_id', 0));
        if ($novelId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $novelModel = new NovelModel();
        $novel = $novelModel->getNovelByNovelId($novelId);
        if (empty($novel)) {
            return $this->apiError(AppCode::NOVEL_IS_NOT_EXISTS);
        }

        // 添加数据
        $data = [];

        // 作者
        $authorId = intval($this->req->post('author_id', 0));
        if ($authorId > 0) {
            $authorModel = new Author();
            $author = $authorModel->getAuthorByWhere(['author_id' => $authorId]);
            if (empty($author)) {
                return $this->apiError(AppCode::AUTHOR_IS_NOT_EXISTS);
            }
            $data['author_id'] = $authorId;
        } else {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        // 分类
        $categoryId = intval($this->req->post('category_id', 0));
        if ($categoryId > 0) {
            $categoryModel = new Category();
            $category = $categoryModel->getCategoryByWhere(['category_id' => $categoryId]);
            if (empty($category)) {
                return $this->apiError(AppCode::CATEGORY_IS_NOT_EXISTS);
            }
            $data['category_id'] = $categoryId;
        } else {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        // 小说名
        $novelName = $this->req->post('novel_name', '');
        if (!empty($novelName) && mb_strlen($novelName) < 40) {
            $novel = $novelModel->getNovelByWhere(['novel_name' => $novelName]);
            if (!empty($novel)) {
                return $this->apiError(AppCode::NOVEL_NAME_IS_EXISTS);
            }
            $data['novel_name'] = $novelName;
        } else {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        // 封面
        $cover = $this->req->post('cover', '');
        if (!empty($cover)) {
            // TODO 检查是合格的url
            $data['cover'] = $cover;
        }

        // 小说介绍
        $introduction = $this->req->post('introduction', '');
        if (!empty($introduction) && mb_strlen($introduction) <= 120) {
            $data['introduction'] = $introduction;
        }

        // 来源链接
        $formUrl = $this->req->post('from_url', '');
        if (!empty($formUrl)) {
            $data['from_url'] = $formUrl;
        }

        $data['is_hotest'] = intval($this->req->post('is_hotest', 0) === 1);
        $data['is_hot'] = intval($this->req->post('is_hot', 0) === 1);
        $data['is_recommend'] = intval($this->req->post('is_recommend', 0) === 1);
        $data['is_end'] = intval($this->req->post('is_end', 0) === 1);
        $data['novel_state'] = intval($this->req->post('novel_state', 0) === 1);

        $novelId = $novelModel->addNovel($data);
        if (!$novelId) {
            return $this->apiError(AppCode::INSERT_FAIL);
        }
        return $this->apiSuccess(AppCode::INSERT_OK);
    }
}