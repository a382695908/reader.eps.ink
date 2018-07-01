<?php
namespace app\index\controller;

use think\Controller;

class Character extends Controller {

    public function index($id) {
        $id = intval($id);

        // character
        $condition = array(
            'xid' => $id,
        );
        // find
        // $this->assign('character', $xs);

        return $this->fetch();
    }

}
