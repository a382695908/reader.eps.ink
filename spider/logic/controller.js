const spider = require('../lib/spider.js');
const logger = require('../lib/logger.js');
const util = require('../lib/util.js');
const urlMap = require('../config/url.map.js');
const model = require('../model/index.js');
const analyser = require('./analyser.js');

let run = async function (params) {

    let htmlContent = null;
    let htmlData = null;

    // TODO 爬取某分类页面下的数据
    if (typeof params.categoryId == 'string') {
        let url = urlMap.categoryUrl.replace(/XXX/, params.categoryId);
        htmlContent = await spider.crawl(url);
        if (!htmlContent) {
            logger.info('request a empty html content !!');
        }
        htmlData = analyser.analyzeCategory(htmlContent);
        htmlData = JSON.stringify(htmlData);
        let filepath = __dirname + '/../data/' + util.md5(params.url) + '.json';
        await util.writeFile(filepath, htmlData);
        model.closePool();
        return;
    }

    // TODO 爬取指定小说页面的数据
    if (typeof params.novelId == 'string') {
        let novelRaw = await model.novelModel.getNovelById(params.novelId);
        if (novelRaw.length > 0) {
            novelRaw = novelRaw[0];
            // TODO
            htmlContent = await spider.crawl(novelRaw.spider_urls);
        }

        model.closePool();
        return;
    }

    // TODO 爬取指定章节页面的数据
    if (typeof params.chapterId == 'string') {
        // 填充 章节url
        let url = urlMap.chapterUrl.replace(/XXX/, params.chapterId);
        htmlContent = await spider.crawl(url);
        if (!htmlContent) {
            logger.info('request a empty html content !!');
        }
        htmlData = analyser.analyzeChapter(htmlContent);
        htmlData = JSON.stringify(htmlData);
        let filepath = __dirname + '/../data/' + util.md5(params.url) + '.json';
        await util.writeFile(filepath, htmlData);
        model.closePool();
        return;
    }

    // 爬取指定URL下的数据
    if (typeof params.url == 'string') {
        htmlContent = await spider.crawl(params.url);
        if (!htmlContent) {
            logger.info('request a empty html content !!');
        }
        if (params.url == urlMap.homeUrl) {
            htmlData = analyser.analyzeHome(htmlContent);
        }
        htmlData = JSON.stringify(htmlData);
        let filepath = __dirname + '/../data/' + util.md5(params.url) + '.json';
        await util.writeFile(filepath, htmlData);

        // TODO: Regexp匹配 分类url
        // TODO: Regexp匹配 小说url
        // TODO: Regexp匹配 章节url
        // TODO: Regexp匹配 排行榜url

        model.closePool();
        return 1;
    }

    logger.info('无任何参数, 执行结束');
};

module.exports = {
    run
};