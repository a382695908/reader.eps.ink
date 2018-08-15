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
        if (empty($categoryList)) {
            $categoryList = [];
        }
        foreach ($categoryList as &$category) {
            $category['categoryLink'] = url('/category/' . $category['id']);
        }
        unset($category);
        $this->assign('categoryList', $categoryList);

        $novelModel = new Novel();

        // 最热
        $hotestNovels = $novelModel->getHotestNovels('novel.*,author.name AS authorName');
        foreach ($hotestNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('hotestNovels', $hotestNovels);

        // 热门
        $hotNovels = $novelModel->getHotNovels('novel.*, author.name AS authorName, category.alias AS categoryAlias');
        foreach ($hotNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('hotNovels', $hotNovels);

        // 分类下的小说
        $condition = [
            'novel.isend' => 0,
            'novel.is_deleted' => 0,
        ];
        $categoryNovels = $novelModel->getAllCategoryNovels($condition, 'novel.*, author.name AS authorName, category.name as categoryName');
        $categoryNovelList = [];
        foreach ($categoryNovels as $novel) {
            $categoryId = $novel['category'];
            $novel['novelLink'] = url('/novel/' . $novel['id']);
            if (!isset($categoryNovelList[$categoryId])) {
                $categoryNovelList[$categoryId] = [
                    'name' => $novel['categoryName'],
                    'topNovel' => $novel,
                    'novels' => []
                ];
            }
            else {
                $categoryNovelList[$categoryId]['novels'][] = $novel;
            }
        }
        $this->assign('categoryNovelList', $categoryNovelList);

        // 最近更新
        $condition = 'novel.isend = 0';
        $field = 'novel.*, author.name AS authorName, category.name AS categoryName, chapter.name AS chapterName, chapter.id AS chapterId';
        $latestUpdatedNovels = $novelModel->getLatestUpdatedNovelsByWhere($condition, $field);
        foreach ($latestUpdatedNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
            $novel['chapterLink'] = url('/chapter/' . $novel['chapterId']);
            $novel['updateAt'] = date('m-d', $novel['updatetime']);
        }
        unset($novel);
        $this->assign('latestUpdatedNovels', $latestUpdatedNovels);

        // 最新入库
        $condition = 'novel.isend = 0';
        $field = 'novel.*, author.name AS authorName, category.alias AS categoryAlias';
        $latestCreatedNovels = $novelModel->getLatestCreatedNovelsByWhere($condition, $field);
        foreach ($latestCreatedNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('latestCreatedNovels', $latestCreatedNovels);

        // 友情链接
        $friendLinkModel = new FriendLink();
        $friendLinks = $friendLinkModel->getFriendLinks();
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
