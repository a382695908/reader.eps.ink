<?php
namespace app\index\controller;

use think\facade\Cookie;
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
            $this->assign('btn', ['注', '册']);
        } else {
            $this->assign('btn', ['登', '录']);
        }
        $this->assign('t', $t);

        return $this->fetch('auth');
    }

    /**
     * 登陆
     * @Author: eps
     * @return \think\response\Json
     */
    public function login()
    {
        $email = trim($_POST['username']);
        $password = trim($_POST['password']);

        $condition = [
            'account' => $email,
        ];
        $userModel = new \app\index\model\User();
        $user = $userModel->where($condition)->find();

        if ($user['password'] == md5($password . $user['salt'])) {
            $userinfo = $user;
            Session::set('userinfo', $userinfo);
            return $this->apiSuccess(1, $userinfo);
        }

        return $this->apiError(0, '密码错误');
    }

    /**
     * 注销
     * @Author: eps
     */
    public function logout()
    {
        Session::clear();
        return $this->apiSuccess(1, '退出成功!');
    }

    /**
     * 注册
     * @Author: eps
     */
    public function register()
    {
        $password = trim($_POST['password']);
        $email = trim($_POST['username']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        }

        $userModel = new \app\index\model\User();
        $condition = [
            'account' => $email
        ];
        $user = $userModel->where($condition)->find();
        if (!empty($user)) {

        }

        $salt = rand(10000, 1000000);
        $userModel->account = $email;
        $userModel->password = md5($password . $salt);
        $userModel->createtime = time();
        $userModel->logintime = time();
        $userModel->save();
    }
}
