const spider = require('../lib/spider.js');
const urlMap = require('../config/url.map.js');
const model = require('../model/index.js');
const analyser = require('./analyser.js');

/**
 * 爬取器
 * 对传入的参数执行爬取任务, 爬取指定页面
 * @param params
 */
let run = async function (params) {

    let htmlContent = null;
    let htmlData = null;

    if (typeof params.categoryId == 'string') {
        // 填充 分类url
        let url = urlMap.categoryUrl.replace(/XXX/, params.categoryId);
        htmlContent = await spider.crawl(url);
        if (!htmlContent) {

        }
        htmlData = analyser.analyzeCategory(htmlContent);
        model.closePool();
        return;
    }

    if (typeof params.novelId == 'string') {
        // 填充 小说url
        let url = urlMap.novelUrl.replace(/XXX/, params.novelId);
        htmlContent = await spider.crawl(url);
        if (!htmlContent) {

        }
        htmlData = analyser.analyzeNovel(htmlContent);
        model.closePool();
        return;
    }

    if (typeof params.chapterId == 'string') {
        // 填充 章节url
        let url = urlMap.chapterUrl.replace(/XXX/, params.chapterId);
        htmlContent = await spider.crawl(url);
        if (!htmlContent) {

        }
        htmlData = analyser.analyzeChapter(htmlContent);
        model.closePool();
        return;
    }

    if (typeof params.url == 'string') {
        htmlContent = await spider.crawl(params.url);
        if (!htmlContent) {
            console.log('request a empty html content !!');
        }
        if (params.url == urlMap.homeUrl) {
            htmlData = analyser.analyzeHome(htmlContent);
        }
        // TODO: Regexp匹配 分类url
        // TODO: Regexp匹配 小说url
        // TODO: Regexp匹配 章节url
        // TODO: Regexp匹配 排行榜url

        console.log(htmlData.hotestNovel);
        for (let novel of htmlData.hotestNovel) {

            let author = await model.authorModel.getAuthorByName(novel.author);
            if (author.length == 0) {
                let authorId = await model.authorModel.insertAuthor(novel.author);
                // todo: novel数据
                let novelData = {

                }
                let novelId = await model.novelModel.addNovel(novelData);
            }
            else {
                let novel = await model.authorModel.getNovelsByAuthorId(author.id);
            }
        }


        model.closePool();
        return;
    }

    console.log('无任何参数, 执行结束');
};

module.exports = {
    run
};