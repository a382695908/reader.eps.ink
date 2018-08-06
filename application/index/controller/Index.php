<?php
namespace app\index\controller;

use think\facade\Session;

class Index extends Common
{
    /**
     * 首页
     * @Author: eps
     * @return mixed
     */
    public function index()
    {
        $categoryModel = new \app\index\model\Category();
        $category_list = Session::get('category_list');
        foreach ($category_list as &$category) {
            $category['link'] = url('/category/' . $category['id']);
        }
        unset($category);
//        dump($category_list);
        $this->assign('category_list', $category_list);

        $authorModel = new \app\index\model\Author();
        $novelModel = new \app\index\model\Novel();
        $novelCondition = array(
            'isend' => 0,
            'ishotest' => 1,
        );
        $hotest_list = $novelModel->where($novelCondition)->limit(4)->select();
        foreach ($hotest_list as &$novel) {
            $novel['author_name'] = $authorModel->get($novel['author'])['name'];
            $novel['link'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
//        dump($hotest_list);
        $this->assign('hotest_list', $hotest_list);

        $novelCondition = array(
            'isend' => 0,
            'ishot' => 1,
            'ishotest' => 0,
        );
        $hot_list = $novelModel->where($novelCondition)->limit(9)->select();
        foreach ($hot_list as &$novel) {
            $novel['author_name'] = $authorModel->get($novel['author'])['name'];
            $novel['link'] = url('/novel/' . $novel['id']);
            $novel['category_alias'] = $categoryModel->get($novel['category'])['alias'];
        }
        unset($novel);
//        dump($hot_list);
        $this->assign('hot_list', $hot_list);

        // block
        $i = 1;
        $category_novel_list = array();
        foreach ($category_list as $category) {
            if ($i > 6) {
                break;
            }
            $novelCondition = array(
                'category' => $category['id'],
                'isend' => 0
            );
            $top_novel = $novelModel->where($novelCondition)->order('clicks DESC')->limit(1)->find();
            $top_novel['novel_link'] = url('/novel/' . $top_novel['id']);

            $novels = $novelModel->where($novelCondition)->order('clicks DESC')->limit(1, 12)->select();
            if (!empty($novels)) {
                foreach ($novels as &$novel) {
                    $novel['author_name'] = $authorModel->get($novel['author'])['name'];
                    $novel['novel_link'] = url('/novel/' . $novel['id']);
                }
                unset($novel);
            }

            $category_novel_list[] = array(
                'name' => $category['name'],
                'top_novel' => $top_novel,
                'novels' => $novels
            );
            $i++;
        }
//        dump($category_novel_list);exit;
        $this->assign('category_novel_list', $category_novel_list);

        // 最近更新
        $chapterModel = new \app\index\model\Chapter();
        $novelCondition = array('isend' => 0);
        $latest_updated_list = $novelModel->where($novelCondition)->order('updatetime DESC')->limit(30)->select();

        foreach ($latest_updated_list as &$novel) {
            $novel['category_name'] = $categoryModel->get($novel['category'])['name'];
            $novel['novel_link'] = url('/novel/' . $novel['id']);

            $laststChapter = $chapterModel->order('updatetime DESC')->limit(1)->find();
            $novel['chapter_name'] = $laststChapter['name'];
            $novel['chapter_link'] = url('/chapter/' . $laststChapter['id']);

            $novel['author_name'] = $authorModel->get($novel['author'])['name'];
            $novel['updateAt'] = date('m-d', $novel['updatetime']);
        }
        unset($novel);
        $this->assign('latest_updated_list', $latest_updated_list);

        // 最新入库
        $latest_created_list = $novelModel->where($novelCondition)->order('createtime DESC')->limit(30)->select();
        foreach ($latest_created_list as &$novel) {
            $novel['category_alias'] = $categoryModel->get($novel['category'])['alias'];
            $novel['author_name'] = $authorModel->get($novel['author'])['name'];
            $novel['novel_link'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('latest_created_list', $latest_created_list);

        $friendLinkModel = new \app\index\model\FriendLink();
        $friend_links = $friendLinkModel->select();
        $this->assign('friend_links', $friend_links);

        return $this->fetch();
    }

    /**
     * 搜索小说(名字, 作者)
     * @Author: eps
     */
    public function search()
    {
        $search = trim($_POST['search']);

    }

}
