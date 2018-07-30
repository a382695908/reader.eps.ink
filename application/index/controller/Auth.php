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
        if (!empty(Session::get('userinfo'))) {
            return redirect(url('/'));
        }

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
        Session::destroy();
        return $this->apiSuccess(1, '退出成功!');
    }

    /**
     * 注册
     * @Author: eps
     */
    public function register()
    {
        $email = trim($_POST['username']);
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            return $this->apiError(0, '空');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->apiError(0, '不符合电子邮件格式');
        }

        $userModel = new \app\index\model\User();
        $condition = [
            'account' => $email
        ];
        $user = $userModel->where($condition)->find();
        if (!empty($user)) {
            return $this->apiError(0, '已存在该用户');
        }

        $salt = rand(10000, 1000000);
        $userModel->account = $email;
        $userModel->createtime = time();
        $userModel->salt = $salt;
        $userModel->status = 2; // 默认已通过
        $userModel->password = md5($password . $salt);
        $userModel->logintime = time();
        $userModel->save();

        if (empty(Session::get('userinfo'))) {
            Session::set('userinfo', $userModel);
            // TODO: 初始化
            $chapterSetting = [

            ];
            $chapterSetting = json_encode($chapterSetting);
            Cookie::set('chapter_setting', $chapterSetting);
        }
        return $this->apiSuccess(1, $userModel);
    }
}
