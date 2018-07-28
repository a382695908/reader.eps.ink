<?php
/**
 * NAME: Common.php
 * Author: eps
 * DateTime: 7/18/2018 10:01 PM
 */

namespace app\index\controller;

use think\Controller;
use think\facade\Cache;
use think\facade\Env;
use think\facade\Session;

class Common extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // 是否打开trace
        Env::set('app_trace', false);

        // 分类数据做缓存
        if (!Session::get('category_list')) {
            $category_list = Cache::get('category_list');
            if ($category_list === FALSE) {
                $categoryModel = new \app\index\model\Category();
                $category_list = $categoryModel->select();
                $category_list = (empty($category_list)) ? [] : $category_list;
                Cache::set('category_list', $category_list, 3600);
            }
            Session::set('category_list', $category_list);
        }

        // TODO: 分析当前请求的信息, 决定是插入还是更新访客表
        // TODO: 以分析的信息, 更新visit表
    }

}