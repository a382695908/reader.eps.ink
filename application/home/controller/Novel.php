<?php
namespace app\home\controller;

use app\home\model\Author;
use app\home\model\Chapter;
use app\home\model\ChapterGroup;
use app\home\model\Novel as NovelModel;

class Novel extends Common
{
    /**
     * 小说主页面
     * @Author: eps
     * @param $id 小说id
     * @return mixed
     */
    public function index($id)
    {
        $initViewData = $this->init_view();
        $categoryList = $initViewData['categoryList'];

        $novelModel = new NovelModel();
        // 获取小说信息
        $novelId = intval($id);
        $novel = $novelModel->getNovelsByJoin(
            ['r_novel.novel_id' => $novelId],
            'r_novel.*,author_name AS authorName,category_name AS categoryName',
            1, 0
        );
        if (empty($novel)) {
            die;
        }
        $novel = $novel[0];
        $novel['novelLink'] = url('/novel/' . $novel['novel_id']);

        $novel['stateText'] = $novel['is_end'] == 1 ? '已完结' : '连载中';
        $novel['updateAt'] = date('Y-m-d H:i:s', $novel['update_time']);

        $chapterModel = new Chapter();
        $novel['latestChapterUrl'] = url('/chapter/' . $novel['latest_chapter_id']);
        $novel['latestChapterName'] = $chapterModel->getChapterNameByChapterId($novel['latest_chapter_id']);
        $this->assign('novel', $novel);

        // 小说章节组信息
        $chapterGroupModel = new ChapterGroup();
        $chapterGroupList = $chapterGroupModel->getChapterGroupsByWhere(['novel_id' => $novelId])->toArray();
        // 小说章节
        $chapterList = $chapterModel->getChaptersByWhere(['novel_id' => $novelId]);
        foreach ($chapterList as &$chapter) {
            $chapter['chapterLink'] = url('/chapter/' . $chapter['chapter_id']);
        }
        unset($chapter);

        // 抽取12章最新章节
        $latestChapterList = $chapterModel->getChaptersByWhere(['novel_id' => $novelId], '*', 12, 0, 'sort DESC');
        foreach ($latestChapterList as &$chapter) {
            $chapter['chapterLink'] = url('/chapter/' . $chapter['chapter_id']);
        }
        unset($chapter);
        $this->assign('latestChapterList', $latestChapterList);

        // 以章节组ID将章节做分组
        foreach ($chapterGroupList as &$chapterGroup) {
            foreach ($chapterList as &$chapter) {
                if ($chapter['chapter_group_id'] === $chapterGroup['chapter_group_id']) {
                    $chapterGroup['chapters'][] = $chapter;
                }
            }
            unset($chapter);
        }
        unset($chapterGroup);
        $this->assign('chapterGroupList', $chapterGroupList);


        // todo: update novel field `click`

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
        $searchData = [];
        return $this->apiSuccess(1, '搜索成功', $searchData);
    }

    /**
     * recommend
     * @Author: eps
     * @return \think\response\Json
     */
    public function recommend()
    {
        $novel_id = intval($_POST['novel_id']);

//        return $this->apiSuccess(-1, '你已经推荐三次了!');

        // todo: update novel field `recommends`
        return $this->apiSuccess(1, '推荐成功');
    }
}
