<?php
namespace app\index\controller;

use think\Controller;

class Novel extends Controller
{
    /**
     * 小说主页面
     * @Author: eps
     * @param $id 小说id
     * @return mixed
     */
    public function index($id)
    {
        $id = intval($id);
        $condition = array(
            'id' => $id,
            'is_deleted' => 0,
        );
        // find
        // $this->assign('xs', $xs);

        // characters
        $condition = array(
            'xid' => $id,
        );
        // select
        // $this->assign('characters', $xs);

        return $this->fetch();
    }

}
