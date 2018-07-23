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
    public function index()
    {
        // 获取小说分类信息
        $category_list = Session::get('category_list');
        foreach ($category_list as &$category) {
            $category['link'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('category_list', $category_list);

        // session read user
        // $user = session('userinfo');
        // $this->assign('user', $user);


        return $this->fetch('auth');
    }

    /**
     * 登陆
     * @Author: eps
     */
    public function login()
    {
        $account = trim($_POST['account']);
        $password = trim($_POST['password']);

        $email = (!empty($_POST['email'])) ? trim($_POST['email']) : '';

        $condition = array();
        if (!empty($_POST['email'])) {
            $condition['email'] = $email;
        } else {
            $condition['account'] = $account;
        }
        // find
        $user = find();
        if ($user['password'] == md5($password . $user['salt'])) {
            // session

            // apiSuccess
        }
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
        $account = trim($_POST['account']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        // verifycode

        // check email

        // check unique user

        $createtime = time();

        // save
    }
}
