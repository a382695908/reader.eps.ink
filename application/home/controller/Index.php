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
                'isend' => 0,
                'category_id' => $categoryId
            ];
            $field = 'r_novel.*, author_name AS authorName, category_name AS categoryName';
            $categoryNovels = $novelModel->getNovelsByJoin($condition, $field, 13);
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
        $latestUpdatedNovels = $novelModel->getLatestUpdatedNovelsByWhere(['is_end' => 0]);
        foreach ($latestUpdatedNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
            $novel['chapterLink'] = url('/chapter/' . $novel['chapterId']);
            $novel['updateAt'] = date('m-d', $novel['updatetime']);
        }
        unset($novel);
        $this->assign('latestUpdatedNovels', $latestUpdatedNovels);

        // 最新入库
        $latestCreatedNovels = $novelModel->getLatestCreatedNovelsByWhere(['is_end' => 0]);
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
