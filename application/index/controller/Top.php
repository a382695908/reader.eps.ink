<?php
namespace app\index\controller;

use think\Controller;

class Top extends Controller
{
    /**
     * 排行榜的主页面
     * @Author: eps
     * @return mixed
     */
    public function index()
    {
        // category


        // xs select order by clicks
        // foreach ($xs_list as $xs) {
        // }

        // sort()
//        $this->assign('list');
        return $this->fetch();
    }

}
