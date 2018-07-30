<?php
namespace app\index\controller;

use think\Facade\Session;

class Visit extends Common
{
    public function visitor_log() {
        // TODO: 分析当前请求的信息, 决定是插入还是更新访客表
        // TODO: 以分析的信息, 更新visit表
    }

}
