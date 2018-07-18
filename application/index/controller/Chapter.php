<?php
namespace app\index\controller;

class Chapter extends Common
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
