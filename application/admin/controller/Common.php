<?php
/**
 * NAME: Common.php
 * Author: eps
 * DateTime: 7/23/2018 8:58 PM
 */

namespace app\admin\controller;

use think\Controller;
use think\facade\Cache;
use think\facade\Session;

class Common extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

}