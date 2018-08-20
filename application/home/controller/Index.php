<?php
namespace app\home\controller;

use app\home\model\Novel;

class Index extends Common
{
    /**
     * 首页
     * @Author: eps
     * @return mixed
     */
    public function index()
    {
        $initViewData = $this->init_view();
        $categoryList = $initViewData['categoryList'];
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

        // 分类下的小说(只拿6个分类下的)
        $categoryNovelList = [];
        $categoryIndex = 1;
        foreach ($categoryList as $category) {
            $categoryId = $category['id'];
            $condition = [
                'novel.isend' => 0,
                'novel.is_deleted' => 0,
                'novel.category' => $categoryId
            ];
            $field = 'novel.*, author.name AS authorName, category.name AS categoryName';
            $categoryNovels = $novelModel->getAllCategoryNovels($condition, $field, 13);
            foreach ($categoryNovels as $key => $novel) {
                $novel['novelLink'] = url('/novel/' . $novel['id']);

                if ($key == 0) {
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
            if ($categoryIndex == 6) {
                break;
            }
            $categoryIndex++;
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
