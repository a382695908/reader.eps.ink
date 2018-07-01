<?php
namespace app\index\controller;

use think\Controller;

class Auth extends Controller {

    public function index() {
        // session read user
        // $user = session('userinfo');
        // $this->assign('user', $user);
        return $this->fetch('auth');
    }

    public function login() {
        $account = trim($_POST['account']);
        $password = trim($_POST['password']);

        $email = (!empty($_POST['email'])) ? trim($_POST['email']) : '';

        $condition = array();
        if (!empty($_POST['email'])) {
            $condition['email'] = $email;
        }
        else {
            $condition['account'] = $account;
        }
        // find
        $user = find();
        if ($user['password'] == md5($password . $user['salt'])) {
            // session

            // apiSuccess
        }
    }

    public function logout() {
        // session('userinfo', NULL);
        // session_destory
        // apiSuccess
    }

    public function register() {
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
