<?php
namespace app\home\controller;

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

        $novelModel = new \app\home\model\Novel();
        // 小说总榜
        $condition = [
            'is_deleted' => 0,
            'isend' => 0,
        ];
        $novelList = $novelModel->where($condition)->order('clicks DESC')->limit(0, 15)->select()->toArray();
        $category_keyby_cid = array_keyby($categoryList, 'id');
        $index = 1;
        foreach ($novelList as &$novel) {
            $novel['is_top'] = ($index <= 3);
            $novel['link_url'] = url('/novel/' . $novel['id']);
            $catgory_id = $novel['category'];
            $novel['category_name'] = $category_keyby_cid[$catgory_id]['name'];
            $novel['index'] = $index;
            $index++;
        }
        unset($novel);
        $this->assign('all_rank_list', $novelList);

        // 各个分类的排行榜
        foreach ($categoryList as &$category) {
            $condition = [
                'category' => $category['id'],
                'is_deleted' => 0,
                'isend' => 0,
            ];
            $novelList = $novelModel->where($condition)->order('clicks DESC')->limit(0, 15)->select()->toArray();
            $index = 1;
            foreach ($novelList as &$novel) {
                $novel['is_top'] = ($index <= 3);
                $novel['link_url'] = url('/novel/' . $novel['id']);
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
