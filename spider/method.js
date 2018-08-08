const cheerio = require('cheerio');

// 分析请求到的html, 解析出数据
let analyze = function (content) {
    let $ = cheerio.load(content.text);
    let menuList = [];
    // menuList
    $('#subnav_pk ul li a').each((index, item) => {
        menuList.push({
            href: $(item).attr('href'),
            text: $(item).text()
        });
    });
    // 获取每个图集块的封面, 图集链接等
    let blockList = [];
    $('li.box').each((index, item) => {
        if (index == 0) {
            return;
        }
        let obj = {};
        obj.cover = $(item).find('a img').attr('src');
        obj.link = $(item).children('a').attr('href');
        obj.title = $(item).find('em a').text();
        obj.crawlTime = Date.now();
        obj.galleryId = obj.link.match(/[0-9]+/)[0];
        blockList.push(obj);
    });
    return {
        menus: menuList,
        blocks: blockList
    };
};

let analyzeHome = function (content) {
    let $ = cheerio.load(content.text);
    let hotestNovel = [];
    let veryRecommendNovel = [];
    let categoryNovel = [];
    let latestUpdateNovel = [];
    let latestAddNovel = [];

    $('body > div.wrap > div.hot > div.l.bd > div').each(function (index, item) {
        let $item = $(item);
        let novelImg = $item.find('.p10 .image a img').attr('src');
        let author = $item.find('.p10 dl dt span').text();
        let novelName = $item.find('.p10 dl dt a').text();
        let novelLink = $item.find('.p10 dl dt a').attr('href');
        let desc = $item.find('.p10 dl dd').text();
        hotestNovel.push({
            novelImg,
            author,
            novelName,
            novelLink,
            desc
        });
    });

    $('body > div.wrap > div.hot > div.r.bd > ul > li').each(function (index, item) {
        let $item = $(item);
        let categoryAlias = $item.find('span.s1').text();
        let novelName = $item.find('span.s2 a').text();
        let novelLink = $item.find('span.s2 a').attr('href');
        let author = $item.find('span.s5').text();
        veryRecommendNovel.push({
            categoryAlias,
            novelName,
            novelLink,
            author
        });
    });

    $('body > div.wrap > div.type.bd > div').each(function (index, item) {
        let $item = $(item);
        let categoryName = $(item).find('h2').text();
        let novels = [];

        let firstNovelImg = $item.find('.p10 .image a img').attr('src');
        let firstNovelAuthor = $item.find('.p10 dl dt span').text();
        let firstNovelName = $item.find('.p10 dl dt a').text();
        let firstNovelLink = $item.find('.p10 dl dt a').attr('href');
        let firstDesc = $item.find('.p10 dl dd').text();
        novels.push({
            novelImg: firstNovelImg,
            author: firstNovelAuthor,
            novelName: firstNovelName,
            novelLink: firstNovelLink,
            desc: firstDesc
        });

        $item.find('div > ul > li').each(function (index, item) {
            let $item = $(item);
            let NovelAuthor = $item.text();
            let NovelName = $item.find('a').text();
            let NovelLink = $item.find('a').attr('href');

            novels.push({
                novelImg: '',
                author: NovelAuthor,
                novelName: NovelName,
                novelLink: NovelLink,
                desc: ''
            });
        });

        categoryNovel.push({
            categoryName,
            novels
        });
    });

    $('body > div.wrap > div.up > div.l.bd > ul > li').each(function (index, item) {
        let $item = $(item);
        let categoryName = $item.find('span.s1').text();
        let novelName = $item.find('span.s2 a').text();
        let novelLink = $item.find('span.s2 a').attr('href');
        let latestChapterName = $item.find('span.s3 a').text();
        let latestChapterLink = $item.find('span.s3 a').attr('href');
        let author = $item.find('span.s4').text();
        let updateTime = $item.find('span.s5').text();

        latestUpdateNovel.push({
            categoryName,
            novelName,
            novelLink,
            latestChapterName,
            latestChapterLink,
            author,
            updateTime
        });
    });

    $('body > div.wrap > div.up > div.r.bd > ul > li').each(function (index, item) {
        let $item = $(item);
        let categoryAlias = $item.find('span.s1').text();
        let novelName = $item.find('span.s2 a').text();
        let novelLink = $item.find('span.s2 a').attr('href');
        let author = $item.find('span.s5').text();

        latestAddNovel.push({
            categoryAlias,
            novelName,
            novelLink,
            author
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

module.exports = {
    analyze,
    analyzeHome
};
