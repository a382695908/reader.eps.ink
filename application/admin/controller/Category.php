<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use app\admin\model\Log;
use think\facade\Request;
use app\admin\model\Category as CategoryModel;
use think\facade\Session;

class Category extends Common
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
     * 分类列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function categorys()
    {
        if ($this->res) {
            return $this->res;
        }
        $status = $this->req->get('status', 0);
        $status = intval($status);

        $where = [];
        if ($status > 0 && ($status === 1 || $status === 2)) {
            $where['status'] = $status - 1;
        }

        $categoryModel = new CategoryModel();
        $categoryList = $categoryModel->getCategorysByWhere($where, 'category_id,category_name,category_alias,status');
        return $this->apiSuccess(AppCode::OK, $categoryList);
    }

    /**
     * 分类详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function category()
    {
        if ($this->res) {
            return $this->res;
        }
        $categoryId = $this->req->get('category_id', 0);
        $categoryId = intval($categoryId);
        if ($categoryId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryByWhere(['category_id' => $categoryId]);
        $category['create_time'] = date('Y-m-d H:i:s', $category['create_time']);
        $category['update_time'] = date('Y-m-d H:i:s', $category['update_time']);
        return $this->apiSuccess(AppCode::OK, $category);
    }

    /**
     * 修改分类
     * @Author: eps
     */
    public function edit_category()
    {
        if ($this->res) {
            return $this->res;
        }
        $categoryId = $this->req->post('category_id', 0);
        $categoryId = intval($categoryId);
        if ($categoryId <= 0) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        // TODO 批量处理

        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryByWhere(['category_id' => $categoryId]);
        if (empty($category)) {
            return $this->apiError(AppCode::CATEGORY_IS_NOT_EXISTS);
        }

        $updateData = [];

        // 状态
        $status = $this->req->post('status', 0);
        $status = intval($status);
        if ($status > 0 && ($status === 1 || $status === 2)) {
            $updateData['status'] = $status - 1;
        }

        // 分类名
        $categoryName = $this->req->post('category_name', '');
        if (is_string($categoryName) && $categoryName) {
            if (mb_strlen($categoryName) !== 4) {
                return $this->apiError(AppCode::CATEGORY_NAME_LENGTH_REQUIRE);
            }
            if (!is_chinese_str($categoryName)) {
                return $this->apiError(AppCode::CATEGORY_REQUIRE_CHINESE);
            }
            $category = $categoryModel->getCategoryByWhere(['category_name' => $categoryName]);
            if (!empty($category) && $category['category_id'] !== $categoryId) {
                return $this->apiError(AppCode::CATEGORY_NAME_IS_EXISTS);
            }
            $updateData['category_name'] = $categoryName;
        }

        // 分类别名
        $categoryAlias = $this->req->post('category_alias', '');
        if (is_string($categoryAlias) && $categoryAlias) {
            if (mb_strlen($categoryAlias) !== 2) {
                return $this->apiError(AppCode::CATEGORY_ALIAS_LENGTH_REQUIRE);
            }
            if (!is_chinese_str($categoryAlias)) {
                return $this->apiError(AppCode::CATEGORY_REQUIRE_CHINESE);
            }
            $category = $categoryModel->getCategoryByWhere(['category_alias' => $categoryAlias]);
            if (!empty($category) && $category['category_id'] !== $categoryId) {
                return $this->apiError(AppCode::CATEGORY_ALIAS_IS_EXISTS);
            }
            $updateData['category_alias'] = $categoryAlias;
        }

        if (empty($updateData)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $bool = $categoryModel->updateCategoryByWhere(['category_id' => $categoryId], $updateData);
        if (!$bool) {
            return $this->apiError(AppCode::UPDATE_FAIL);
        }

        $logModel = new Log();
        $logModel->logEditCategory(Session::get('admin_id'), ['update_data' => $updateData, 'form_data' => $this->req->post()]);

        return $this->apiSuccess(AppCode::UPDATE_OK);
    }

    /**
     * 添加分类
     * @Author: eps
     * @return null|\think\response\Json
     */
    public function add_category()
    {
        if ($this->res) {
            return $this->res;
        }

        $insertData = [];
        $categoryModel = new CategoryModel();

        // 分类名
        $categoryName = $this->req->post('category_name', '');
        if (is_string($categoryName) && $categoryName) {
            if (mb_strlen($categoryName) !== 4) {
                return $this->apiError(AppCode::CATEGORY_NAME_LENGTH_REQUIRE);
            }
            if (!is_chinese_str($categoryName)) {
                return $this->apiError(AppCode::CATEGORY_REQUIRE_CHINESE);
            }
            $category = $categoryModel->getCategoryByWhere(['category_name' => $categoryName]);
            if (!empty($category)) {
                return $this->apiError(AppCode::CATEGORY_NAME_IS_EXISTS);
            }
            $insertData['category_name'] = $categoryName;
        }

        // 分类别名
        $categoryAlias = $this->req->post('category_alias', '');
        if (is_string($categoryAlias) && $categoryAlias) {
            if (mb_strlen($categoryAlias) !== 2) {
                return $this->apiError(AppCode::CATEGORY_ALIAS_LENGTH_REQUIRE);
            }
            if (!is_chinese_str($categoryAlias)) {
                return $this->apiError(AppCode::CATEGORY_REQUIRE_CHINESE);
            }
            $category = $categoryModel->getCategoryByWhere(['category_alias' => $categoryAlias]);
            if (!empty($category)) {
                return $this->apiError(AppCode::CATEGORY_ALIAS_IS_EXISTS);
            }
            $insertData['category_alias'] = $categoryAlias;
        }

        if (!isset($insertData['category_name']) || !isset($insertData['category_alias'])) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        $insertData['status'] = 0;

        $categoryId = $categoryModel->addCategory($insertData);
        if (!$categoryId) {
            return $this->apiError(AppCode::INSERT_FAIL);
        }

        $logModel = new Log();
        $logModel->logAddCategory(Session::get('admin_id'), ['update_data' => $insertData, 'form_data' => $this->req->post()]);

        return $this->apiSuccess(AppCode::INSERT_OK);
    }

    /**
     * 检查分类名是否唯一
     * @Author: eps
     */
    public function check_category_name()
    {
        if ($this->res) {
            return $this->res;
        }

        // 分类名
        $categoryName = $this->req->get('category_name', '');
        if (!is_string($categoryName) || empty($categoryName)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        if (mb_strlen($categoryName) !== 4) {
            return $this->apiError(AppCode::CATEGORY_NAME_LENGTH_REQUIRE);
        }
        if (!is_chinese_str($categoryName)) {
            return $this->apiError(AppCode::CATEGORY_REQUIRE_CHINESE);
        }

        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryByWhere(['category_name' => $categoryName]);
        if (!empty($category)) {
            return $this->apiError(AppCode::CATEGORY_NAME_IS_EXISTS);
        }
        return $this->apiSuccess(AppCode::OK);
    }

    /**
     * 检查分类别名是否唯一
     * @Author: eps
     */
    public function check_category_alias()
    {
        if ($this->res) {
            return $this->res;
        }

        // 分类名
        $categoryAlias = $this->req->get('category_alias', '');
        if (!is_string($categoryAlias) || empty($categoryAlias)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        if (mb_strlen($categoryAlias) !== 4) {
            return $this->apiError(AppCode::CATEGORY_NAME_LENGTH_REQUIRE);
        }
        if (!is_chinese_str($categoryAlias)) {
            return $this->apiError(AppCode::CATEGORY_REQUIRE_CHINESE);
        }

        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryByWhere(['category_alias' => $categoryAlias]);
        if (!empty($category)) {
            return $this->apiError(AppCode::CATEGORY_NAME_IS_EXISTS);
        }
        return $this->apiSuccess(AppCode::OK);
    }
}