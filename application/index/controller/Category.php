<?php
namespace app\index\controller;

use think\Controller;

class Category extends Controller
{

    const PAGE_SIZE = 30;

    /**
     * 分类主页面
     * @Author: eps
     * @param $cid 分类id
     * @param int $page 页数
     * @return mixed
     */
    public function index($cid, $page = 1)
    {

        $category_id = intval($cid);

        // click xs limit 6
        // $this->assign('category', $category_list);

        // latest create xs limit 30
        // $this->assign('latest_created', $category_list);

        // recommend xs
        // $this->assign('recommends', $category_list);

        return $this->fetch();
    }

    /**
     * 全本主页面
     * @Author: eps
     */
    public function isend()
    {

    }

}
