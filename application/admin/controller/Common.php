<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use think\Controller;
use think\facade\Session;

class Common extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // ----------  同包方法 ----------

    /**
     * API响应成功
     * @Author: eps
     * @param $code
     * @param $message
     * @param array $data
     * @return \think\response\Json
     */
    protected function apiSuccess($code, $data = [])
    {
        return json(['code' => $code, 'message' => AppCode::getText($code), 'data' => $data]);
    }

    /**
     * API响应错误
     * @Author: eps
     * @param $code
     * @param array $data
     * @return \think\response\Json
     */
    protected function apiError($code, $data = [])
    {
        return json(['code' => $code, 'message' => AppCode::getText($code), 'data' => $data]);
    }

    /**
     * 检查Token的正确性
     * @Author: eps
     * @param $token
     * @param $time
     * @return \think\response\Json
     */
    protected function checkValidToken($token, $time)
    {
        if (!Session::get('is_login')) {
            return $this->apiError(AppCode::ADMIN_IS_LOGIN);
        }
        if (!is_string($token)) {
            return $this->apiError(AppCode::TOKEN_TYPE_ERROR);
        }
        $time = intval($time);
        if (empty($token) || empty($time)) {
            return $this->apiError(AppCode::CHECK_TOKEN_PARAM_EMPTY);
        }
        if ($token !== Session::get('user_token')) {
            return $this->apiError(AppCode::TOKEN_MATCH_FAIL);
        }
        if ($time !== Session::get('login_time')) {
            return $this->apiError(AppCode::LOGIN_TIME_MATCH_FAIL);
        }
        // 如果超出一小时
        if ($time > Session::get('login_time') + 3600) {
            Session::clear();
            Session::destroy();
            return $this->apiError(AppCode::LOGIN_TIME_OVER_TIME);
        }
    }
}