<?php
namespace app\index\controller;

use think\facade\Session;

class Category extends Common
{

    const PAGE_SIZE = 30;

    /**
     * 分类主页面
     * @Author: eps
     * @param $cid 分类id
     * @param int $page 页数
     * @return mixed
     */
    public function index($cid, $page = 1)
    {
        $category_id = intval($cid);
        $category_list = Session::get('category_list');
        foreach ($category_list as &$category) {
            $category['link'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('category_list', $category_list);

        $category_list = array_keyby($category_list, 'id');
        $category = $category_list[$category_id];
        $this->assign('category', $category);

        // 热门小说
        $authorModel = new \app\index\model\Author();
        $novelModel = new \app\index\model\Novel();
        $novelCondition = array(
            'isend' => 0,
            'category' => $category_id
        );
        $hotest_list = $novelModel->where($novelCondition)->order('clicks DESC')->limit(6)->select();
        foreach ($hotest_list as &$novel) {
            $novel['author_name'] = $authorModel->get($novel['author'])['name'];
            $novel['link'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
//        dump($hotest_list);exit;
        $this->assign('hotest_list', $hotest_list);


        // 最近更新
        $chapterModel = new \app\index\model\Chapter();
        $novelCondition = array(
            'isend' => 0,
            'category' => $category_id
        );
        $latest_updated_list = $novelModel->where($novelCondition)->order('updatetime DESC')->limit(30)->select();

        foreach ($latest_updated_list as &$novel) {
//            $novel['category_name'] = $categoryModel->get($novel['category'])['name'];
            $novel['novel_link'] = url('/novel/' . $novel['id']);

            $laststChapter = $chapterModel->order('updatetime DESC')->limit(1)->find();
            $novel['chapter_name'] = $laststChapter['name'];
            $novel['chapter_link'] = url('/chapter/' . $laststChapter['id']);

            $novel['author_name'] = $authorModel->get($novel['author'])['name'];
            $novel['updateAt'] = date('m-d', $novel['updatetime']);
        }
        unset($novel);
        $this->assign('latest_updated_list', $latest_updated_list);

        // 推荐
        $novelCondition = array(
            'isend' => 0,
            'is_recommend' => 1,
            'category' => $category_id
        );
        $recommend_novels = $novelModel->where($novelCondition)->order('clicks DESC')->limit(30)->select();
        foreach ($recommend_novels as &$novel) {
            $novel['author_name'] = $authorModel->get($novel['author'])['name'];
            $novel['link'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
//        dump($recommend_novels);exit;
        $this->assign('recommend_novels', $recommend_novels);

        // TODO: 分页
        return $this->fetch();
    }

    /**
     * 全本主页面
     * @Author: eps
     */
    public function isend()
    {

    }

}
