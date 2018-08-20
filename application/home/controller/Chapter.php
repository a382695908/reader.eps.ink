<?php
namespace app\home\controller;

use think\Facade\Session;

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
        // 获取小说分类信息
        $category_list = Session::get('category_list');
        foreach ($category_list as &$category) {
            $category['link'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('category_list', $category_list);

        $id = intval($id);
        $chapterModel = new \app\home\model\Chapter();
        $chapter = $chapterModel->where('id', $id)->find();
        $chapter['content'] = html_entity_decode($chapter['content']);
//        echo $chapter['content'];
//        dump($chapter['content']);exit;
        $this->assign('chapter', $chapter);

        $novelModel = new \app\home\model\Novel();
        $novel = $novelModel->where('id', $chapter['novel'])->find();
        $novel['link_url'] = url('/novel/' . $novel['id']);
        $this->assign('novel', $novel);

        return $this->fetch();
    }

}
