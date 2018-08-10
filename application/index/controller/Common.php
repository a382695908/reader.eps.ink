<?php
/**
 * NAME: Common.php
 * Author: eps
 * DateTime: 7/18/2018 10:01 PM
 */

namespace app\index\controller;

use app\index\model\Category;
use think\Controller;
use think\facade\Session;

class Common extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (Session::get('assess_denied') == 1) {
            die;
        }

        if (!Session::get('category_list')) {
            $categoryModel = new Category();
            $categoryList = $categoryModel->getCategorys();
            Session::set('category_list', $categoryList);
        }
    }

    public function apiSuccess($code, $message, $data = []) {
        $responseData = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        return json($responseData);
    }

    public function apiError($code, $message, $data = []) {
        $responseData = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        return json($responseData);
    }

}