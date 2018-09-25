<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\home\model\Novel;
use think\facade\Request;

class Site extends Common
{
    private $req;

    public function __construct()
    {
        parent::__construct();
        $this->req = Request::instance();
        if (!$this->req->isAjax()) {
            return $this->apiError(1, '非ajax请求!');
        }
    }

    public function visit_list()
    {

    }

    public function visitor_list()
    {

    }

    public function system_set() {

    }

    public function edit_system_set() {

    }

}