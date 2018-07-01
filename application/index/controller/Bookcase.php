<?php
namespace app\index\controller;

use think\Controller;

class Bookcase extends Controller {

    public function index() {

        // session('userinfo')

        // bookcases
        $condition = array(
            'userid' => $user['id'],
        );
        // select
        // $this->assign('bookcases', $xs);

        return $this->fetch();
    }

    public function add($id) {

        // session('userinfo')

        // bookcase
        $condition = array(
            'xsid' => $id,
            'userid' => $user['id'],
        );
        // find
        // if
        // insert
    }

    public function delete($id) {

        // session('userinfo')

        // bookcase
        $condition = array(
            'xsid' => $id,
            'userid' => $user['id'],
        );
        // find
        // save
    }

}
