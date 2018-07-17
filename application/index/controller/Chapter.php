<?php
namespace app\index\controller;

use think\Controller;

class Chapter extends Controller
{
    /**
     * 小说的章节页面
     * @Author: eps
     * @param $id
     * @return mixed
     */
    public function index($id)
    {
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
