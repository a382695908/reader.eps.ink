<?php
namespace app\admin\controller;

use app\admin\model\AppCode;
use think\facade\Request;

class Site extends Common
{
    private $req;

    public function __construct()
    {
        parent::__construct();
        $this->req = Request::instance();
        if (!$this->req->isAjax()) {
            return $this->apiError(AppCode::REQUEST_IS_NOT_AJAX);
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