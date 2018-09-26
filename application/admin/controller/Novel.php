<?php
/**
 * NAME: Novel.php
 * Author: eps
 * DateTime: 9/25/2018 11:44 PM
 */
namespace app\admin\controller;

use app\home\model\Novel as NovelModel;
use app\admin\model\AppCode;
use think\facade\Request;

class Novel extends Common
{
    private $req;

    public function __construct()
    {
        parent::__construct();
        $this->req = Request::instance();
        if (!$this->req->isAjax()) {
            return $this->apiError(AppCode::IS_NOT_AJAX);
        }
    }

    /**
     * 小说列表
     * @Author: eps
     * @return \think\response\Json
     */
    public function novels()
    {
        $page = intval($this->req->get('page')) ?: 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $novelModel = new NovelModel();
        $novelList = $novelModel->getNovelsByWhere([], '*', 10, $limit, $offset);
        return $this->apiSuccess(0, '查询成功', $novelList);
    }

    /**
     * 小说详情
     * @Author: eps
     * @return \think\response\Json
     */
    public function novel()
    {
        $novelId = intval($this->req->get('novel_id')) ?: 0;
        if ($novelId === 0) {
            return $this->apiError(1, '参数错误');
        }
        $novelModel = new NovelModel();
        $novel = $novelModel->getNovelByNovelId($novelId);

        // TODO 章节

        return $this->apiSuccess(0, '查询成功', $novel);
    }

    /**
     * 编辑小说
     * @Author: eps
     * @return \think\response\Json
     */
    public function edit_novel()
    {
        $novelId = intval($this->req->get('novel_id')) ?: 0;
        if ($novelId === 0) {
            return $this->apiError(1, '参数错误');
        }

        // TODO
        // 1. 修改基本信息
        // 2. 更改分类
        // 3. 更改小说作者
        // 4. 更改小说状态 (最热, 热, 推荐)
    }
}