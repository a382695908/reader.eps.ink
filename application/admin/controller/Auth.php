<?php
namespace app\admin\controller;

use app\admin\model\Admin;
use app\admin\model\Log;
use app\admin\model\AppCode;
use think\facade\Request;
use think\facade\Session;

class Auth extends Common
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
     * 登录
     * @Author: eps
     */
    public function login()
    {
        if (Session::get('is_login')) {
            return $this->apiError(AppCode::ADMIN_HAD_LOGIN);
        }

        $account = $this->req->post('account');
        $password = $this->req->post('password');

        if (!is_string($account) || !is_string($password)) {
            return $this->apiError(AppCode::LOGIN_PARAM_TYPE_ERROR);
        }
        if (empty($account) || empty($password)) {
            return $this->apiError(AppCode::LOGIN_PARAM_EMPTY);
        }

        $adminModel = new Admin();
        $admin = $adminModel->getAdminByAccount($account);
        if (empty($admin)) {
            return $this->apiError(AppCode::ADMIN_NOT_EXISTS);
        }
        if (!password_verify($password, $admin['password'])) {
            return $this->apiError(AppCode::PASSWORD_MATCH_FAIL);
        }

        $logModel = new Log();
        $logModel->logLogin($admin['admin_id'], ['ip' => $this->req->ip()]);

        $time = time();
        $adminModel->updateByAdminId($admin['admin_id'], ['login_time' => $time]);

        $data = [
            'user_token' => md5($admin['admin_id'] . $time),
            'login_time' => $time,
        ];
        Session::set('is_login', 1);
        Session::set('user_token', $data['user_token']);
        Session::set('login_time', $time);

        return $this->apiSuccess(AppCode::LOGIN_OK, $data);
    }

    /**
     * 退出
     * @Author: eps
     * @return \think\response\Json
     */
    public function logout()
    {
        $this->checkValidToken($this->req->post('user_token'), $this->req->post('login_time'));
        if (!Session::get('is_login')) {
            return $this->apiError(AppCode::ADMIN_NO_LOGIN);
        }
        Session::clear();
        Session::destroy();
        return $this->apiSuccess(AppCode::EXIT_OK);
    }


}