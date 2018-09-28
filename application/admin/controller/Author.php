<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use app\admin\model\Novel;
use think\facade\Request;
use app\admin\model\Author as AuthorModel;

class Author extends Common
{
    private $req;

    public function __construct()
    {
        parent::__construct();
        $this->req = Request::instance();
        if (!$this->req->isAjax()) {
            return $this->apiError(AppCode::IS_NOT_AJAX);
        }
        $this->checkValidToken(
            $this->req->get('user_token') ?: $this->req->post('user_token'),
            $this->req->get('login_time') ?: $this->req->post('login_time')
        );
    }

    /**
     * 作者列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function authors()
    {
        $authorName = $this->req->get('author_name', '');
        $page = $this->req->get('page', 1);
        $page = $page ? intval($page) : 1;
        $page = $page > 0 ? $page : 1;

        $authorModel = new AuthorModel();
        $where = [];
        if ($authorName) {
            array_push($where, ['author_name', 'LIKE', '%' . $authorName . '%']);
        }
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $orderBy = 'author_id ASC';
        $authorList = $authorModel->getAuthorsByWhere($where, '*', $limit, $offset, $orderBy);
        return $this->apiSuccess(AppCode::OK, $authorList);
    }

    /**
     * 作者详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function author()
    {
        $authorId = $this->req->get('author_id', 0);

        if ($authorId <= 0) {
            return $this->apiError(AppCode::AUTHOR_PARAM_ERROR);
        }

        // 查询作者
        $authorModel = new AuthorModel();
        $author = $authorModel->getAuthorByWhere(['author_id' => $authorId]);
        if (empty($author)) {
            return $this->apiError(AppCode::AUTHOR_NOT_EXISTS);
        }
        $authorId = $author['author_id'];

        // 查询作者下的小说列表
        $novelModel = new Novel();
        $novelList = $novelModel->getNovelsByWhere(['author_id' => $authorId], '*', 0, NULL, 'create_time DESC');
        $author->novelList = $novelList;

        return $this->apiSuccess(AppCode::OK, $author);
    }

    /**
     * 修改作者
     * @Author: eps
     */
    public function edit_author()
    {
        $authorId = $this->req->post('author_id', 0);
        $data = $this->req->post('data', []);

        if ($authorId <= 0) {
            return $this->apiError(AppCode::AUTHOR_PARAM_ERROR);
        }
        if (!is_array($data) || empty($data)) {
            return $this->apiError(AppCode::AUTHOR_PARAM_ERROR);
        }

        $authorModel = new AuthorModel();
        $author = $authorModel->getAuthorByWhere(['author_id' => $authorId]);
        if (empty($author)) {
            return $this->apiError(AppCode::AUTHOR_NOT_EXISTS);
        }

        $bool = $authorModel->updateAuthorByWhere(['author_id' => $authorId], $data);
        if ($bool) {
            return $this->apiSuccess(AppCode::UPDATE_OK);
        } else {
            return $this->apiError(AppCode::UPDATE_FAIL);
        }
    }

    /**
     * 添加作者
     * @Author: eps
     */
    public function add_author()
    {
        $data = $this->req->post('data', []);
        if (!is_array($data) || empty($data)) {
            return $this->apiError(AppCode::AUTHOR_PARAM_ERROR);
        }

        $authorModel = new AuthorModel();
        $authorId = $authorModel->addAuthor($data);
        if (!$authorId) {
            return $this->apiError(AppCode::INSERT_FAIL);
        }
        return $this->apiSuccess(AppCode::INSERT_OK);
    }

}