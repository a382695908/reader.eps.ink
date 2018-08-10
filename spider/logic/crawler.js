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

        }
        if (params.url == urlMap.homeUrl) {
            htmlData = analyser.analyzeHome(htmlContent);
        }
        // 匹配 分类url
        // 匹配 小说url
        // 匹配 章节url
        // 匹配 排行榜url
        model.closePool();
        return;
    }

    console.log('无任何参数, 执行结束');
};

module.exports = {
    run
};