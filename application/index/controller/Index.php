<?php
namespace app\index\controller;

use app\index\model\FriendLink;
use app\index\model\Novel;
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
        $categoryList = Session::get('categoryList');
        foreach ($categoryList as &$category) {
            $category['link'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('categoryList', $categoryList);

        $novelModel = new Novel();

        // 最热
        $hotestNovels = $novelModel->getHotestNovels('novel.*,author.name AS authorName');
        foreach ($hotestNovels as &$novel) {
            $novel['link'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('hotestNovels', $hotestNovels);

        // 热门
        $hotNovels = $novelModel->getHotNovels('novel.*, author.name AS authorName, category.alias AS categoryAlias');
        foreach ($hotNovels as &$novel) {
            $novel['link'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('hotNovels', $hotNovels);

        // 分类下的小说
        $condition = [
            'novel.isend' => 0,
            'novel.is_deleted' => 0,
        ];
        $field = 'novel.*, category.name as categoryName';
        $categoryNovels = $novelModel->getAllCategoryNovels($condition, $field);
        if (empty($categoryNovels)) {
            $categoryNovels = [];
        }
        $categoryNovelList = [];
        foreach ($categoryNovels as $novel) {
            $categoryId = $novel['category'];
            if (!isset($categoryNovelList[$categoryId])) {
                $categoryNovelList[$categoryId] = [
                    'name' => $novel['categoryName'],
                    'topNovel' => $novel,
                ];
            }
            else {
                $categoryNovelList[$categoryId]['novels'][] = $novel;
            }
        }
//        dump($categoryNovelList);exit;
        $this->assign('categoryNovelList', $categoryNovelList);

        // 最近更新
        $condition = ['novel.isend' => 0];
        $field = 'novel.*, author.name AS authorName, category.name AS categoryName, chapter.name AS chapterName';
        $latestUpdatedList = $novelModel->getLatestNovelsByCategoryId($condition, $field);
        foreach ($latestUpdatedList as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);

//            $laststChapter = $chapterModel->order('updatetime DESC')->limit(1)->find();
//            $novel['chapterName'] = $laststChapter['name'];
//            $novel['chapterLink'] = url('/chapter/' . $laststChapter['id']);

            $novel['updateAt'] = date('m-d', $novel['updatetime']);
        }
        unset($novel);
        $this->assign('latestUpdatedList', $latestUpdatedList);

        // 最新入库
        $condition = ['novel.isend' => 0];
        $field = 'novel.*, author.name AS authorName, category.alias AS categoryAlias, chapter.name AS chapterName';
        $latestCreatedList = $novelModel->getLatestNovelsByCategoryId($condition, $field);
        foreach ($latestCreatedList as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('latestCreatedList', $latestCreatedList);

        $friendLinkModel = new FriendLink();
        $friendLinks = $friendLinkModel->select();
        $this->assign('friendLinks', $friendLinks);

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
