<?php
namespace app\home\controller;

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
        if (empty(Session::get('userinfo'))) {
            return redirect(url('/register'));
        }

//        $condition = array(
//            'userid' => $user['user_id'],
//        );
        // select
        // $this->assign('bookcases', $xs);

        return $this->fetch();
    }

    /**
     * 新增书籍到书架
     * @Author: eps
     * @return \think\response\Json
     */
    public function add()
    {
        if (empty(Session::get('userinfo'))) {
            return $this->apiError(-1, '先登录再收藏!');
        }

        $novel_id = intval($_POST['novel_id']);

        // todo: if exists

        // todo: insert row into bookcase

        return $this->apiSuccess(1, '加入书架成功');
    }

    /**
     * 删除书架里的书籍
     * @Author: eps
     */
    public function delete()
    {

        // session('userinfo')

        // bookcase
//        $condition = array(
//            'xsid' => $id,
//            'userid' => $user['user_id'],
//        );
        // find
        // save
    }

}
