<?php
namespace app\index\controller;

use think\Facade\Session;

class Bookcase extends Common
{
    /**
     * 书架主页面
     * @Author: eps
     * @return mixed
     */
    public function index()
    {
        $userinfo = Session::get('userinfo');
        if (empty($userinfo)) {
            return redirect(url('/auth'));
        }

        // session('userinfo')

        // bookcases
//        $condition = array(
//            'userid' => $user['id'],
//        );
        // select
        // $this->assign('bookcases', $xs);

        return $this->fetch();
    }

    /**
     * 新增书籍到书架
     * @Author: eps
     * @param $id
     */
    public function add($id)
    {

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

    /**
     * 删除书架里的书籍
     * @Author: eps
     * @param $id
     */
    public function delete($id)
    {

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
