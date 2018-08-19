<?php
namespace app\index\controller;

use app\index\model\Author;
use app\index\model\FriendLink;
use app\index\model\Novel;
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
        $categoryList = Session::get('categoryList');
        if (empty($categoryList)) {
            $categoryList = [];
        }
        foreach ($categoryList as &$category) {
            $category['categoryLink'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('categoryList', $categoryList);


        $categoryId = intval($cid);

        // 热门小说
        $novelModel = new Novel();
        $condition = [
            'novel.isend' => 0,
            'novel.is_deleted' => 0,
            'novel.category' => $categoryId
        ];
        $field = 'novel.*, author.name AS authorName, category.name AS categoryName';
        $hotestNovels = $novelModel->getAllCategoryNovels($condition, $field, 6);
        foreach ($hotestNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('hotestNovels', $hotestNovels);
//        dump($hotestNovels);
//        dump($novelModel->getLastSql());die;

        // 最近更新
        $condition = 'novel.isend = 0 AND novel.is_deleted = 0 AND novel.category = ' . $categoryId;
        $field = 'novel.*, author.name AS authorName, category.name AS categoryName, chapter.name AS chapterName, chapter.id AS chapterId';
        $latestUpdatedNovels = $novelModel->getCategoryLatestUpdatedNovels($condition, $field);
//        dump($latestUpdatedNovels);
//        dump($novelModel->getLastSql());die;

        foreach ($latestUpdatedNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
            $novel['chapterLink'] = url('/chapter/' . $novel['chapterId']);
            $novel['updateAt'] = date('m-d', $novel['updatetime']);
        }
        unset($novel);
        $this->assign('latestUpdatedNovels', $latestUpdatedNovels);

        // 推荐
        $condition = [
            'novel.isend' => 0,
            'novel.is_recommend' => 1,
            'novel.is_deleted' => 0,
        ];
        $field = 'novel.*, author.name AS authorName, category.name AS categoryName, category.alias AS categoryAlias';
        $recommendNovels = $novelModel->getAllCategoryNovels($condition, $field, 30);
        foreach ($recommendNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('recommendNovels', $recommendNovels);
//        dump($recommendNovels);
//        dump($novelModel->getLastSql());die;

        // 友情链接
        $friendLinkModel = new FriendLink();
        $friendLinks = $friendLinkModel->getFriendLinks();
        $this->assign('friendLinks', $friendLinks);

        // TODO: 分页
        return $this->fetch();
    }

    /**
     * 全本主页面
     * @Author: eps
     */
    public function isend($page = 1)
    {
        $categoryList = Session::get('categoryList');
        if (empty($categoryList)) {
            $categoryList = [];
        }
        foreach ($categoryList as &$category) {
            $category['categoryLink'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('categoryList', $categoryList);

        // 热门小说
        $novelModel = new Novel();
        $condition = [
            'novel.isend' => 1,
            'novel.is_deleted' => 0,
        ];
        $field = 'novel.*, author.name AS authorName, category.name AS categoryName';
        $hotestNovels = $novelModel->getAllCategoryNovels($condition, $field, 6);
        foreach ($hotestNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('hotestNovels', $hotestNovels);
//        dump($hotestNovels);
//        dump($novelModel->getLastSql());die;

        // 最近更新
        $condition = 'novel.isend = 1 AND novel.is_deleted = 0';
        $field = 'novel.*, author.name AS authorName, category.name AS categoryName, chapter.name AS chapterName, chapter.id AS chapterId';
        $latestUpdatedNovels = $novelModel->getCategoryLatestUpdatedNovels($condition, $field);
//        dump($latestUpdatedNovels);
//        dump($novelModel->getLastSql());die;

        foreach ($latestUpdatedNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
            $novel['chapterLink'] = url('/chapter/' . $novel['chapterId']);
            $novel['updateAt'] = date('m-d', $novel['updatetime']);
        }
        unset($novel);
        $this->assign('latestUpdatedNovels', $latestUpdatedNovels);

        // 推荐
        $condition = [
            'novel.isend' => 1,
            'novel.is_recommend' => 1,
            'novel.is_deleted' => 0,
        ];
        $field = 'novel.*, author.name AS authorName, category.name AS categoryName, category.alias AS categoryAlias';
        $recommendNovels = $novelModel->getAllCategoryNovels($condition, $field, 30);
        foreach ($recommendNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('recommendNovels', $recommendNovels);
//        dump($recommendNovels);
//        dump($novelModel->getLastSql());die;

        // 友情链接
        $friendLinkModel = new FriendLink();
        $friendLinks = $friendLinkModel->getFriendLinks();
        $this->assign('friendLinks', $friendLinks);

        return $this->fetch('index');
    }

}
