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

        // 查询最热门小说
        $hotestNovels = $novelModel->getHotestNovels();
        foreach ($hotestNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
        }
        unset($novel);
        $this->assign('hotestNovels', $hotestNovels);

        // 查询热门小说
        $hotNovels = $novelModel->getHotNovels();
        foreach ($hotNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
        }
        unset($novel);
        $this->assign('hotNovels', $hotNovels);

        // 查询前六个分类点击量最多的13个小说
        $categoryNovelList = [];
        $categoryIndex = 1;
        foreach ($categoryList as $category) {
            $categoryId = $category['category_id'];
            $categoryNovels = $novelModel->getNovelsByJoin(
                ['is_end' => 0, 'r_category.category_id' => $categoryId],
                'r_novel.*,author_name AS authorName,category_name AS categoryName',
                13
            );
            foreach ($categoryNovels as $key => $novel) {
                $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
                if ($key == 0) {
                    $categoryNovelList[$categoryId] = [
                        'categoryName' => $novel['categoryName'],
                        'topNovel' => $novel,
                        'novels' => []
                    ];
                } else {
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
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
            $novel['chapterLink'] = url('/chapter/' . $novel['chapterId']);
            $novel['updateAt'] = date('m-d', $novel['update_time']);
        }
        unset($novel);
        $this->assign('latestUpdatedNovels', $latestUpdatedNovels);

        // 最新入库
        $latestCreatedNovels = $novelModel->getLatestCreatedNovelsByWhere(['is_end' => 0]);
        foreach ($latestCreatedNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
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
