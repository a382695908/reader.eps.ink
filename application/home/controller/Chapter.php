<?php
namespace app\home\controller;

use app\home\model\Chapter as ChapterModel;
use app\home\model\Novel;

class Chapter extends Common
{
    /**
     * 小说的章节页面
     * @Author: eps
     * @param $id
     * @return mixed
     */
    public function index($id)
    {
        $this->init_view();

        $chapterId = intval($id);
        $chapterModel = new ChapterModel();
        $chapter = $chapterModel->getChapterByChapterId($chapterId);
        $chapter['content'] = html_entity_decode($chapter['content']);
        $this->assign('chapter', $chapter);

        $novelModel = new Novel();
        $novel = $novelModel->getNovelByNovelId($chapter['novel_id']);
        $novel['novelLink'] = url('/novel/' . $novel['novel_id']);
        $this->assign('novel', $novel);

        if ($novel['latest_chapter_id'] == $id) {
            $nextChapterLink = $novel['novelLink'];
        } else {
            $nextChapterLink = url('/chapter/' . ($chapter['sort'] + 1));
        }

        $this->assign('nextChapterLink', $nextChapterLink);
        $lastChapterLink = $chapter['sort'] > 1 ? url('/chapter/' . ($chapter['sort'] - 1)) : $novel['novelLink'];
        $this->assign('lastChapterLink', $lastChapterLink);
        return $this->fetch();
    }

}
