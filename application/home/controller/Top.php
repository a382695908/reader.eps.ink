<?php
namespace app\home\controller;

use app\home\model\Novel;

class Top extends Common
{
    /**
     * 排行榜的主页面
     * @Author: eps
     * @return mixed
     */
    public function index()
    {
        $initViewData = $this->init_view();
        $categoryList = $initViewData['categoryList'];

        // 小说总榜
        $novelModel = new Novel();
        $novelList = $novelModel->getNovelsByWhere(['is_end' => 0], '*', 0, 15, 'clicks DESC');
        $categoryList = array_keyby($categoryList, 'category_id');

        $index = 1;
        foreach ($novelList as &$novel) {
            $novel['is_top'] = $index <= 3;
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
            $novel['category_name'] = $categoryList[$novel['category_id']]['category_name'];
            $novel['index'] = $index;
            $index++;
        }
        unset($novel);
        $this->assign('allRankList', $novelList);

        // 各个分类的排行榜
        foreach ($categoryList as &$category) {
            $novelList = $novelModel->getNovelsByWhere(['category_id' => $category['category_id'], 'is_end' => 0], '*', 0, 15, 'clicks DESC');
            $index = 1;
            foreach ($novelList as &$novel) {
                $novel['is_top'] = $index <= 3;
                $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
                $novel['index'] = $index;
                $index++;
            }
            unset($novel);
            $category['rank_list'] = $novelList;
        }
        unset($category);
        $this->assign('all_cat_rank_list', $categoryList);

        return $this->fetch();
    }

}
