<?php
namespace app\index\controller;

use think\Facade\Session;

class Auth extends Common
{
    /**
     * 登陆主页面
     * @Author: eps
     * @return mixed
     */
    public function index($t = 0)
    {
        // 获取小说分类信息
        $category_list = Session::get('category_list');
        foreach ($category_list as &$category) {
            $category['link'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('category_list', $category_list);

        if (intval($t) === 1) {
            $this->assign('btn', ['注','册']);
        }
        else {
            $this->assign('btn', ['登','录']);
        }
        $this->assign('t', $t);

        return $this->fetch('auth');
    }

    /**
     * 登陆
     * @Author: eps
     */
    public function login()
    {
        $email = trim($_POST['username']);
        $password = trim($_POST['password']);

        $condition = [

        ];
//        $user = find();
//        if ($user['password'] == md5($password . $user['salt'])) {
            // session

            // apiSuccess
//        }
    }

    /**
     * 注销
     * @Author: eps
     */
    public function logout()
    {
        // session('userinfo', NULL);
        // session_destory
        // apiSuccess
    }

    /**
     * 注册
     * @Author: eps
     */
    public function register()
    {
        $email = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        // verifycode

        // check email

        // check unique user

        $createtime = time();

        // save
    }
}
