<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller {

    public function index() {

        // xs category select
        // $this->assign('category', $category_list);

        // very good xs
        // $this->assign('best_xs', $category_list);

        // good xs
        // $this->assign('good_xs', $category_list);

        // latest update xs limit 30
        // $this->assign('latest_updated', $category_list);

        // latest create xs limit 30
        // $this->assign('latest_created', $category_list);

        // friend links
        // $this->assign('friend_links', $category_list);

        return $this->fetch();
    }

}
