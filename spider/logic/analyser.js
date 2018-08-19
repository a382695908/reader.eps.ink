const cheerio = require('cheerio');

// TODO: novelName , novelLink 必须不为空

/**
 * 分析主页面
 * @param content
 * @returns {{hotestNovel: Array, veryRecommendNovel: Array, categoryNovel: Array, latestUpdateNovel: Array, latestAddNovel: Array}}
 */
let analyzeHome = function (content) {
    let $ = cheerio.load(content.text);
    // 最热数据
    let hotestNovel = [];
    // 强力推荐
    let veryRecommendNovel = [];
    // 分类下的数据
    let categoryNovel = [];
    // 最近更新
    let latestUpdateNovel = [];
    // 最近入库
    let latestAddNovel = [];

    // 最热数据
    $('body > div.wrap > div.hot > div.l.bd > div').each(function (index, item) {
        let $item = $(item);
        let novelImg = $item.find('.p10 .image a img').attr('src');
        let authorName = $item.find('.p10 dl dt span').text();
        let novelName = $item.find('.p10 dl dt a').text();
        let novelLink = $item.find('.p10 dl dt a').attr('href');
        let desc = $item.find('.p10 dl dd').text();
        hotestNovel.push({
            novelImg,
            authorName,
            novelName,
            novelLink,
            desc,
            isHotest: 1,
        });
    });

    // 强力推荐
    $('body > div.wrap > div.hot > div.r.bd > ul > li').each(function (index, item) {
        let $item = $(item);
        let categoryAlias = $item.find('span.s1').text();
        let novelName = $item.find('span.s2 a').text();
        let novelLink = $item.find('span.s2 a').attr('href');
        let authorName = $item.find('span.s5').text();

        categoryAlias = categoryAlias.replace(/\[/, '');
        categoryAlias = categoryAlias.replace(/\]/, '');

        veryRecommendNovel.push({
            categoryAlias,
            novelName,
            novelLink,
            authorName,
            isHot: 1,
        });
    });

    // 分类下的数据
    $('body > div.wrap > div.type.bd > div').each(function (index, item) {
        let $item = $(item);
        let categoryName = $(item).find('h2').text();

        let firstNovelImg = $item.find('.p10 .image a img').attr('src');
        let firstNovelAuthorName = ''; // 很不幸, 在此没有作者的名字
        let firstNovelName = $item.find('.p10 dl dt a').text();
        let firstNovelLink = $item.find('.p10 dl dt a').attr('href');
        let firstDesc = $item.find('.p10 dl dd').text();
        categoryNovel.push({
            categoryName,
            novelImg: firstNovelImg,
            authorName: firstNovelAuthorName,
            novelName: firstNovelName,
            novelLink: firstNovelLink,
            desc: firstDesc
        });

        $item.find('div > ul > li').each(function (index, item) {
            let $item = $(item);
            let authorName = $item.text();
            authorName = authorName.slice(authorName.indexOf('/') + 1);

            let NovelName = $item.find('a').text();
            let NovelLink = $item.find('a').attr('href');

            categoryNovel.push({
                categoryName,
                novelImg: '',
                authorName: authorName,
                novelName: NovelName,
                novelLink: NovelLink,
                desc: ''
            });
        });
    });

    // 最近更新
    $('body > div.wrap > div.up > div.l.bd > ul > li').each(function (index, item) {
        let $item = $(item);
        let categoryName = $item.find('span.s1').text();
        let novelName = $item.find('span.s2 a').text();
        let novelLink = $item.find('span.s2 a').attr('href');
        let latestChapterName = $item.find('span.s3 a').text();
        let latestChapterLink = $item.find('span.s3 a').attr('href');
        let authorName = $item.find('span.s4').text();
        let updateTime = $item.find('span.s5').text();

        latestUpdateNovel.push({
            categoryName,
            novelName,
            novelLink,
            latestChapterName,
            latestChapterLink,
            authorName,
            updateTime
        });
    });

    // 最近入库
    $('body > div.wrap > div.up > div.r.bd > ul > li').each(function (index, item) {
        let $item = $(item);
        let categoryAlias = $item.find('span.s1').text();
        let novelName = $item.find('span.s2 a').text();
        let novelLink = $item.find('span.s2 a').attr('href');
        let authorName = $item.find('span.s5').text();

        latestAddNovel.push({
            categoryAlias,
            novelName,
            novelLink,
            authorName
        });
    });

    return {
        hotestNovel,
        veryRecommendNovel,
        categoryNovel,
        latestUpdateNovel,
        latestAddNovel
    };
};

/**
 * 分析分类页面
 * @param content
 */
let analyzeCategory = function (content) {


};

/**
 * 分析排行榜
 * @param content
 */
let analyzeTop = function (content) {

};

/**
 * 分析小说页
 * @param content
 */
let analyzeNovel = function (content) {

};

/**
 * 分析小说章节页
 * @param content
 */
let analyzeChapter = function (content) {

};

module.exports = {
    analyzeHome,
    analyzeCategory,
    analyzeTop,
    analyzeNovel,
    analyzeChapter,
};
