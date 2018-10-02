<?php
namespace app\admin\controller;

use app\admin\model\Admin as AdminModel;
use app\admin\model\Log;
use app\admin\model\AppCode;
use think\facade\Request;
use think\facade\Session;

class Admin extends Common
{
    private $req;
    private $res;

    public function __construct()
    {
        parent::__construct();
        $this->req = Request::instance();
        if (!$this->req->isAjax()) {
            $this->res = $this->apiError(AppCode::REQUEST_IS_NOT_AJAX);
            return ;
        }
    }

    /**
     * 登录
     * @Author: eps
     */
    public function login()
    {
        if ($this->res) {
            return $this->res;
        }
        if (Session::get('is_login')) {
            return $this->apiError(AppCode::ADMIN_IS_LOGIN);
        }

        $account = $this->req->post('account');
        $password = $this->req->post('password');

        if (!is_string($account) || !is_string($password)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }
        if (empty($account) || empty($password)) {
            return $this->apiError(AppCode::PARAM_ERROR);
        }

        $adminModel = new AdminModel();
        $admin = $adminModel->getAdminByAccount($account);
        if (empty($admin)) {
            return $this->apiError(AppCode::ADMIN_IS_NOT_EXISTS);
        }
        if (!password_verify($password, $admin['password'])) {
            return $this->apiError(AppCode::ADMIN_PASSWORD_MATCH_FAIL);
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
        Session::set('admin_id', $admin['admin_id']);
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
        if ($this->res) {
            return $this->res;
        }
        $res = $this->checkValidToken(
            $this->req->post('user_token'),
            $this->req->post('login_time')
        );
        if ($res) {
            return $res;
        }

        $logModel = new Log();
        $logModel->logLogout(Session::get('admin_id'), ['logout_time' => time()]);

        Session::clear();
        Session::destroy();
        return $this->apiSuccess(AppCode::EXIT_OK);
    }


}