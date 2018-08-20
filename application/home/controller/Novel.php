<?php
namespace app\home\controller;

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

        $novelModel = new Novel();
        // 获取小说信息
        $id = intval($id);
        $authorModel = new \app\home\model\Author();
        $novelModel = new \app\home\model\Novel();
        $condition = [
            'id' => $id,
            'is_deleted' => 0,
        ];
        $novel = $novelModel->where($condition)->find();
        $novel['author_name'] = $authorModel->get($novel['author'])['name'];
        $novel['link_url'] = url('/novel/' . $novel['id']);
        foreach ($categoryList as $category) {
            if ($novel['category'] == $category['id']) {
                $novel['category_name'] = $category['name'];
                break;
            }
        }
        $novel['state_text'] = ($novel['isend']) ? '已完结' : '连载中';
        $novel['updateAt'] = date('Y-m-d H:i:s', $novel['updatetime']);
        // TODO: 最新章节链接 & 章节名
        $novel['last_chapter_url'] = '';
        $novel['last_chapter_name'] = '';
        $this->assign('novel', $novel);

        // 小说章节组信息
        $chapterGroupModel = new \app\home\model\ChapterGroup();
        $chapterGroupList = $chapterGroupModel->where('novel', $id)->order('createtime ASC')->select()->toArray();
        // 小说章节
        $chapterModel = new \app\home\model\Chapter();
        $chapterList = $chapterModel->where('novel', $id)->order('createtime ASC')->select()->toArray();
        foreach ($chapterList as &$chapter) {
            $chapter['link_url'] = url('/chapter/' . $chapter['id']);
        }
        unset($chapter);

        // 抽取12章最新章节
        $lastChapterList = $chapterModel->where('novel', $id)->order('createtime DESC')->select()->toArray();
        foreach ($lastChapterList as &$chapter) {
            $chapter['link_url'] = url('/chapter/' . $chapter['id']);
        }
        unset($chapter);
        $this->assign('last_chapter_list', $lastChapterList);

        // 章节组与小说章节绑定
        foreach ($chapterGroupList as &$chapterGroup) {
            foreach ($chapterList as &$chapter) {
                if ($chapter['chapter_group'] === $chapterGroup['id']) {
                    $chapterGroup['chapters'][] = $chapter;
                }
            }
            unset($chapter);
        }
        unset($chapterGroup);
        $this->assign('chapter_group_chapters', $chapterGroupList);


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
