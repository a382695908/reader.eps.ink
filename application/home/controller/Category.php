<?php
namespace app\home\controller;

use app\home\model\Novel;

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
        $this->init_view();
        $categoryId = intval($cid);

        // 热门小说
        $novelModel = new Novel();
        $condition = [
            'novel.is_end' => 0,
            'novel.category' => $categoryId
        ];
        $field = 'r_novel.*, author_name AS authorName, category_name AS categoryName';
        $hotestNovels = $novelModel->getNovelsByJoin($condition, $field, 6);
        foreach ($hotestNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('hotestNovels', $hotestNovels);
//        dump($hotestNovels);
//        dump($novelModel->getLastSql());die;

        // 最近更新
        $latestUpdatedNovels = $novelModel->getLatestUpdatedNovelsByWhere(['is_end' => 0, 'r_novel.category_id' => $categoryId]);
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
            'is_end' => 0,
            'is_recommend' => 1,
        ];
        $field = 'r_novel.*, author_name AS authorName, category_name AS categoryName, category_alias AS categoryAlias';
        $recommendNovels = $novelModel->getNovelsByJoin($condition, $field, 30);
        foreach ($recommendNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('recommendNovels', $recommendNovels);
//        dump($recommendNovels);
//        dump($novelModel->getLastSql());die;

        // TODO: 分页
        return $this->fetch();
    }

    /**
     * 全本主页面
     * @Author: eps
     */
    public function isend($page = 1)
    {
        $this->init_view();
        // 热门小说
        $novelModel = new Novel();
        $condition = [
            'novel.is_end' => 1,
        ];
        $field = 'r_novel.*, author_name AS authorName, category_name AS categoryName';
        $hotestNovels = $novelModel->getNovelsByJoin($condition, $field, 6);
        foreach ($hotestNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('hotestNovels', $hotestNovels);
//        dump($hotestNovels);
//        dump($novelModel->getLastSql());die;

        // 最近更新
        $latestUpdatedNovels = $novelModel->getLatestUpdatedNovelsByWhere(['is_end' => 1]);
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
            'is_end' => 1,
            'is_recommend' => 1,
        ];
        $field = 'r_novel.*, author_name AS authorName, category_name AS categoryName, category_alias AS categoryAlias';
        $recommendNovels = $novelModel->getNovelsByJoin($condition, $field, 30);
        foreach ($recommendNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['id']);
        }
        unset($novel);
        $this->assign('recommendNovels', $recommendNovels);
//        dump($recommendNovels);
//        dump($novelModel->getLastSql());die;

        return $this->fetch('index');
    }

}
