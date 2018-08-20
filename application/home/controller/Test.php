<?php
namespace app\index\controller;

use think\Controller;
use think\facade\Session;

class Test extends Controller
{
    public function ds()
    {

        if (isset($_GET['clear']) && intval($_GET['clear']) === 1) {
            Session::clear();
            Session::destroy();
        }

        dump(Session::get());
    }
}
