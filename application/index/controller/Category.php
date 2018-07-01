<?php
namespace app\index\controller;

use think\Controller;

class Category extends Controller {

    const PAGE_SIZE = 30;

    public function index($cid) {

        $category_id = intval($cid);
        $page = intval($_POST['page']);
        $isend = intval($_POST['isend']);

        // click xs limit 6
        // $this->assign('category', $category_list);

        // latest create xs limit 30
        // $this->assign('latest_created', $category_list);

        // recommend xs
        // $this->assign('recommends', $category_list);

        return $this->fetch();
    }

}
