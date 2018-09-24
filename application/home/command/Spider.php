<?php
namespace app\home\command;

use app\home\model\Author;
use app\home\model\Category;
use app\home\model\Novel;
use think\console\Command;
use think\console\Input;
use think\console\Output;

class Spider extends Command
{
    protected function configure()
    {
        $this->addArgument('filename', 1, '文件名');
        $this->setName('spider');
        $this->setDescription('处理爬虫的JSON数据');
    }

    protected function execute(Input $input, Output $output)
    {
        $filename = $input->getArgument('filename');
        if (empty($filename)) {
            $output->writeln('文件名为空');
        }

        $file_path = './spider/data/' . $filename;
        if (!file_exists($file_path)) {
            $output->writeln('文件不存在');
        }

        $json_string = file_get_contents($file_path);
        if (empty($json_string)) {
            $output->writeln('文件名内容为空');
        }

        $jsonData = json_decode($json_string, true);
        if (empty($jsonData)) {
            $output->writeln('文件名json格式不正确');
        }


        $novelModel = new Novel();
        $authorModel = new Author();
        $categoryModel = new Category();

        // 最热门的四个小说
        $time = time();
        foreach ($jsonData['hotestNovel'] as &$value) {
            // 查询是否已存在该小说
            $authorRaw = $authorModel->getAuthorByAuthorName($value['authorName']);
            $novelRaw = $novelModel->getNovelByWhere(['novel_name' => $value['novelName']]);

            if (
                $authorRaw
                && $novelRaw
                && $novelRaw['author_id'] == $authorRaw['author_id']
            ) {
                continue;
            }

            $novelModel->startTrans();
            // 作者ID
            $authorId = $authorRaw ? $authorRaw['author_id'] : 0;
            if (!$authorRaw) {
                $authorId = $authorModel->insert(['author_name' => $value['authorName']]);
            }

            $insertData = [];
            $updateData = [];

            if (!$novelRaw) {
                $insertData = [
                    'cover' => $value['novelImg'],
                    'author_id' => $authorId,
                    'novel_name' => $value['novelName'],
                    'from_url' => $value['novelLink'],
                    'introduction' => $value['desc'],
                    'is_hotest' => 1,
                ];
            }

            // TODO 出现了同名小说不同作者的情况.... 那就,,,那先就什么也不做
            if (
                $authorRaw
                && $novelRaw
                && $novelRaw['author_id'] != $authorRaw['author_id']
            ) {

            }

            if (!empty($insertData)) {
                $insertData['create_time'] = $time;
                $novelId = $novelModel->insert($insertData);
            }
            if (!empty($updateData)) {
                $updateData['update_time'] = $time;
                $bool = $novelModel->update($updateData, ['novel_id' => $novelRaw['novel_id']]);
            }

            $novelModel->commit();
        }
        unset($value);

        // 强力推荐小说 -> 热门小说
        $time = time();
        foreach ($jsonData['veryRecommendNovel'] as &$value) {
            // 查询是否已存在该小说
            $authorRaw = $authorModel->getAuthorByAuthorName($value['authorName']);
            $novelRaw = $novelModel->getNovelByWhere(['novel_name' => $value['novelName']]);
            $categoryRaw = $categoryModel->getCategoryByAlias($value['categoryAlias']);

            if (
                $authorRaw
                && $novelRaw
                && $novelRaw['author_id'] == $authorRaw['author_id']
                && $novelRaw['category_id'] == $categoryRaw['category_id']
            ) {
                continue;
            }

            $novelModel->startTrans();
            // 作者ID
            $authorId = $authorRaw ? $authorRaw['author_id'] : 0;
            if (!$authorRaw) {
                $authorId = $authorModel->insert(['author_name' => $value['authorName']]);
            }

            $insertData = [];
            $updateData = [];

            if (!$novelRaw) {
                $insertData = [
                    'author_id' => $authorId,
                    'category_id' => $categoryRaw['category_id'],
                    'novel_name' => $value['novelName'],
                    'from_url' => $value['novelLink'],
                    'is_hot' => 1,
                ];
            }

            // TODO 出现了同名小说不同作者的情况.... 那就,,,那先就什么也不做
            if (
                $authorRaw
                && $novelRaw
                && $novelRaw['author_id'] != $authorRaw['author_id']
            ) {

            }

            if ($novelRaw && $novelRaw['category_id'] != $categoryRaw['category_id']) {
                $updateData = [
                    'category_id' => $categoryRaw['category_id'],
                    'is_hot' => 1,
                ];
            }

            if (!empty($insertData)) {
                $insertData['create_time'] = $time;
                $novelId = $novelModel->insert($insertData);
            }
            if (!empty($updateData)) {
                $updateData['update_time'] = $time;
                $bool = $novelModel->update($updateData, ['novel_id' => $novelRaw['novel_id']]);
            }

            $novelModel->commit();
        }
        unset($value);

//        categoryNovel
//        latestUpdateNovel
//        latestAddNovel

    }
}
