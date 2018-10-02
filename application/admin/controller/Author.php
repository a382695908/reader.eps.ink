<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use app\admin\model\Log;
use app\admin\model\Novel;
use think\facade\Request;
use app\admin\model\Author as AuthorModel;
use think\facade\Session;

class Author extends Common
{
    private $req;
    private $res;

    public function __construct()
    {
        parent::__construct();
        $this->req = Request::instance();
        if (!$this->req->isAjax()) {
            return $this->apiError(AppCode::REQUEST_IS_NOT_AJAX);
        }
        $this->res = $this->checkValidToken(
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
        if ($this->res) {
            return $this->res;
        }
        $authorName = $this->req->get('author_name', '');
        $page = $this->req->get('page', 1);

        $page = $page ? intval($page) : 1;
        $page = $page > 0 ? $page : 1;

        $authorModel = new AuthorModel();
        $where = [];
        if ($authorName) {
            array_push($where, ['author_name', 'LIKE', "%{$authorName}%"]);
        }
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $orderBy = 'create_time DESC';
        $authorList = $authorModel->getAuthorsByWhere($where, '*', $limit, $offset, $orderBy);
        return $this->apiSuccess(AppCode::OK, $authorList);
    }

    /**
     * 作者名称搜索建议
     * @Author: eps
     */
    public function author_name_suggestion()
    {
        if ($this->res) {
            return $this->res;
        }
        $authorName = $this->req->get('author_name', '');
        if (!is_string($authorName) || empty($authorName)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        $authorModel = new AuthorModel();
        $authorList = $authorModel->getAuthorsByWhere([['author_name', 'LIKE', "%{$authorName}%"]], 'author_name')->toArray();
        if (!$authorList) {
            return $this->apiSuccess(AppCode::OK, []);
        }
        $authorList = array_column($authorList, 'author_name');
        return $this->apiSuccess(AppCode::OK, $authorList);
    }

    /**
     * 作者详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function author()
    {
        if ($this->res) {
            return $this->res;
        }
        $authorId = $this->req->get('author_id', 0);

        if ($authorId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        // 查询作者
        $authorModel = new AuthorModel();
        $author = $authorModel->getAuthorByWhere(['author_id' => $authorId]);
        if (empty($author)) {
            return $this->apiError(AppCode::AUTHOR_IS_NOT_EXISTS);
        }
        $authorId = $author['author_id'];

        // 查询作者下的小说列表
        $novelModel = new Novel();
        $novelList = $novelModel->getNovelsByWhere(['author_id' => $authorId], 'novel_name,cover', 0, NULL, 'create_time DESC');
        $author['novel_list'] = $novelList;

        return $this->apiSuccess(AppCode::OK, $author);
    }

    /**
     * 检查是否有同名作者
     * @Author: eps
     */
    public function check_author_name()
    {
        if ($this->res) {
            return $this->res;
        }
        $authorName = $this->req->get('author_name', '');
        if (!is_string($authorName) || empty($authorName)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        $authorModel = new AuthorModel();
        // 查询相同名的作者
        $author = $authorModel->getAuthorByWhere(['author_name' => $authorName]);
        if ($author) {
            return $this->apiError(AppCode::AUTHOR_NAME_IS_EXISTS);
        }
        return $this->apiSuccess(AppCode::OK);
    }

    /**
     * 修改作者
     * @Author: eps
     */
    public function edit_author()
    {
        if ($this->res) {
            return $this->res;
        }
        $authorId = $this->req->post('author_id', 0);
        $authorName = $this->req->post('author_name', '');

        if ($authorId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        if (!is_string($authorName) || empty($authorName)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $authorModel = new AuthorModel();
        $author = $authorModel->getAuthorByWhere(['author_id' => $authorId]);
        if (empty($author)) {
            return $this->apiError(AppCode::AUTHOR_IS_NOT_EXISTS);
        }
        // 查询相同名的作者
        $author = $authorModel->getAuthorByWhere(['author_name' => $authorName]);
        if ($author) {
            return $this->apiError(AppCode::AUTHOR_NAME_IS_EXISTS);
        }

        // 执行更新
        $data = ['author_name' => $authorName];
        $bool = $authorModel->updateAuthorByWhere(['author_id' => $authorId], $data);
        if (!$bool) {
            return $this->apiSuccess(AppCode::UPDATE_FAIL);
        }

        $logModel = new Log();
        $logModel->logEditAuthor(Session::get('admin_id'), ['edit_data' => $data, 'form_data' => $this->req->post()]);
        return $this->apiError(AppCode::UPDATE_OK);
    }

    /**
     * 添加作者
     * @Author: eps
     */
    public function add_author()
    {
        if ($this->res) {
            return $this->res;
        }
        $authorName = $this->req->post('author_name', '');
        if (!is_string($authorName) || empty($authorName)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $authorModel = new AuthorModel();
        $author = $authorModel->getAuthorByWhere(['author_name' => $authorName]);
        if ($author) {
            return $this->apiError(AppCode::AUTHOR_NAME_IS_EXISTS);
        }

        $data = ['author_name' => $authorName];
        $authorId = $authorModel->addAuthor($data);
        if (!$authorId) {
            return $this->apiError(AppCode::INSERT_FAIL);
        }

        $logModel = new Log();
        $logModel->logAddAuthor(Session::get('admin_id'), ['add_data' => $data, 'form_data' => $this->req->post()]);

        return $this->apiSuccess(AppCode::INSERT_OK);
    }

}