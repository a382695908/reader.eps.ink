<?php
/**
 * NAME: Common.php
 * Author: eps
 * DateTime: 7/23/2018 8:58 PM
 */

namespace app\admin\controller;

use think\Controller;

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
    protected function apiSuccess($code, $message, $data = [])
    {
        $responseData = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        return json($responseData);
    }

    /**
     * API响应错误
     * @Author: eps
     * @param $code
     * @param $message
     * @param array $data
     * @return \think\response\Json
     */
    protected function apiError($code, $message, $data = [])
    {
        $responseData = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        return json($responseData);
    }
}