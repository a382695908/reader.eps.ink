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
        $page = intval($page);
        if ($page <= 0) {
            $page = 1;
        }

        // 热门小说
        $novelModel = new Novel();
        $hotestNovels = $novelModel->getNovelsByJoin(
            ['is_end' => 0, 'r_category.category_id' => $categoryId],
            'r_novel.*, author_name AS authorName, category_name AS categoryName', 6
        );
        foreach ($hotestNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
        }
        unset($novel);
        $this->assign('hotestNovels', $hotestNovels);

        // 最近更新
        $latestUpdatedNovels = $novelModel->getLatestUpdatedNovelsByWhere(
            ['is_end' => 0, 'r_novel.category_id' => $categoryId],
            self::PAGE_SIZE,
            ($page - 1) * self::PAGE_SIZE
        );
        foreach ($latestUpdatedNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
            $novel['chapterLink'] = url('/chapter/' . $novel['chapterId']);
            $novel['updateAt'] = date('m-d', $novel['update_time']);
        }
        unset($novel);
        $this->assign('latestUpdatedNovels', $latestUpdatedNovels);

        // 分类下所有小说的数量
        $count = $novelModel->countNovelsByWhere(['is_end' => 0, 'r_novel.category_id' => $categoryId]);
        $maxPage = ceil($count / self::PAGE_SIZE);
        $paginate = paginate($page, $maxPage, $categoryId);
        $this->assign('paginate', $paginate);

        // 推荐小说
        $recommendNovels = $novelModel->getNovelsByJoin(
            ['is_end' => 0, 'is_recommend' => 1],
            'r_novel.*, author_name AS authorName, category_name AS categoryName, category_alias AS categoryAlias'
            , 30
        );
        foreach ($recommendNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
        }
        unset($novel);
        $this->assign('recommendNovels', $recommendNovels);

        return $this->fetch('home@category/index');
    }

    /**
     * 全本主页面
     * @Author: eps
     */
    public function isend($page = 1)
    {
        $this->init_view();
        $page = intval($page);
        if ($page <= 0) {
            $page = 1;
        }

        // 热门小说
        $novelModel = new Novel();
        $hotestNovels = $novelModel->getNovelsByJoin(
            ['is_end' => 1],
            'r_novel.*, author_name AS authorName, category_name AS categoryName', 6
        );
        foreach ($hotestNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
        }
        unset($novel);
        $this->assign('hotestNovels', $hotestNovels);

        // 最近更新
        $latestUpdatedNovels = $novelModel->getLatestUpdatedNovelsByWhere(
            ['is_end' => 1],
            self::PAGE_SIZE,
            ($page - 1) * self::PAGE_SIZE
        );
        foreach ($latestUpdatedNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
            $novel['chapterLink'] = url('/chapter/' . $novel['chapterId']);
            $novel['updateAt'] = date('m-d', $novel['update_time']);
        }
        unset($novel);
        $this->assign('latestUpdatedNovels', $latestUpdatedNovels);

        // 分类下所有小说的数量
        $count = $novelModel->countNovelsByWhere(['is_end' => 1]);
        $maxPage = ceil($count / self::PAGE_SIZE);
        $paginate = paginate($page, $maxPage);
        $this->assign('paginate', $paginate);

        // 推荐小说
        $recommendNovels = $novelModel->getNovelsByJoin(
            ['is_end' => 1, 'is_recommend' => 1],
            'r_novel.*, author_name AS authorName, category_name AS categoryName, category_alias AS categoryAlias'
            , 30
        );
        foreach ($recommendNovels as &$novel) {
            $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
        }
        unset($novel);
        $this->assign('recommendNovels', $recommendNovels);

        return $this->fetch('home@category/index');
    }

}
