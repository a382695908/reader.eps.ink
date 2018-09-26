<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
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
    }

    /**
     * 作者列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function authors()
    {
        $authorModel = new AuthorModel();
        $authorList = $authorModel->getAuthorsByWhere();
        return $this->apiSuccess(AppCode::OK, $authorList);
    }

    /**
     * 作者详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function author()
    {
        $authorModel = new AuthorModel();
        $author = $authorModel->getAuthorByWhere();
        return $this->apiSuccess(AppCode::OK, $author);
    }

    /**
     * 修改作者
     * @Author: eps
     */
    public function edit_author()
    {
        $authorModel = new AuthorModel();
        $bool = $authorModel->updateAuthorByWhere();
        return $this->apiSuccess(AppCode::UPDATE_OK);
    }
}