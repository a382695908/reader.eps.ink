<?php
namespace app\index\controller;

use app\index\model\Author;
use app\index\model\Category;
use app\index\model\FriendLink;
use app\index\model\Novel;
use app\index\model\Chapter;
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
        $categoryModel = new Category();
        $categoryList = Session::get('category_list');
        foreach ($categoryList as &$category) {
            $category['link'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('category_list', $categoryList);

        $authorModel = new Author();
        $novelModel = new Novel();
        $hotestNovels = $novelModel->getHotestNovels();
        foreach ($hotestNovels as &$novel) {
            $novel['author_name'] = $authorModel->get($novel['author'])['name'];
            $novel['link'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('hotest_list', $hotestNovels);

        $hot_list = $novelModel->getHotNovels();
        foreach ($hot_list as &$novel) {
            $novel['author_name'] = $authorModel->get($novel['author'])['name'];
            $novel['link'] = url('/novel/' . $novel['id']);
            $novel['category_alias'] = $categoryModel->get($novel['category'])['alias'];
        }
        unset($novel);
        $this->assign('hot_list', $hot_list);

        // block
        $i = 1;
        $category_novel_list = array();
        foreach ($categoryList as $category) {
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
        $chapterModel = new Chapter();
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

        $friendLinkModel = new FriendLink();
        $friend_links = $friendLinkModel->select();
        $this->assign('friend_links', $friend_links);

        return $this->fetch();
    }

    /**
     * search
     * @Author: eps
     * @return \think\response\Json
     */
    public function search()
    {
        $search = trim($_POST['search']);
        return $this->apiSuccess(1, '', [$search]);
    }

}
