<?php
namespace app\home\controller;

use OSS\Core\OssException;
use OSS\Http\RequestCore;
use OSS\Http\ResponseCore;
use OSS\OssClient;
use think\Facade\Session;

class Api extends Common
{
    /**
     * search
     * @Author: eps
     * @return \think\response\Json
     */
    public function search()
    {
        $search = trim($_POST['search']);
        return $this->apiSuccess(0, '', [$search]);
    }
}
