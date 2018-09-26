<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use think\facade\Request;
use app\admin\model\Category as CategoryModel;

class Category extends Common
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
     * 分类列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function categorys()
    {
        $categoryModel = new CategoryModel();
        $categoryList = $categoryModel->getCategorysByWhere();
        return $this->apiSuccess(AppCode::OK, $categoryList);
    }

    /**
     * 分类详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function category()
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryByWhere();
        return $this->apiSuccess(AppCode::OK, $category);
    }

    /**
     * 修改分类
     * @Author: eps
     */
    public function edit_category()
    {
        $categoryModel = new CategoryModel();
        $bool = $categoryModel->updateCategoryByWhere();
        return $this->apiSuccess(AppCode::UPDATE_OK);
    }
}