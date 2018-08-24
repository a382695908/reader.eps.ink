const spider = require('../lib/spider.js');
const logger = require('../lib/logger.js');
const urlMap = require('../config/url.map.js');
const model = require('../model/index.js');
const analyser = require('./analyser.js');

let doHomeNovelList = async function (novelList) {
    const CREATE_TIME = Date.parse(new Date()) / 1000;

    for (let novel of novelList) {
        let authorRaw = null;
        let authorId = 0;
        // 判断数据中是否有小说作者
        if (novel.authorName) {
            // 从数据库中读出该作者
            authorRaw = await model.authorModel.getAuthorByName(novel.authorName);
            // 如果没有这个作者
            if (authorRaw.length == 0) {
                // 插入一条新作者
                authorId = await model.authorModel.insertAuthor(novel.authorName);
            }
            else {
                authorRaw = authorRaw[0];
                authorId = authorRaw.id;
            }
        }

        // 判断数据中是否有小说分类别名
        let categoryRaw = null;
        let categoryId = 0;
        if (novel.categoryAlias) {
            categoryRaw = await model.categoryModel.getCategoryByAlias(novel.categoryAlias);
            // 如果没有这个分类
            if (categoryRaw.length == 0) {
                // .. 什么也不做
            } else {
                categoryRaw = categoryRaw[0];
                categoryId = categoryRaw.id;
            }
        }

        // 判断数据中是否有小说分类名
        if (novel.categoryName) {
            categoryRaw = await model.categoryModel.getCategoryByName(novel.categoryName);
            // 如果没有这个分类
            if (categoryRaw.length == 0) {
                // .. 什么也不做
            } else {
                categoryRaw = categoryRaw[0];
                categoryId = categoryRaw.id;
            }
        }

        // 判断数据中是否有小说名
        let novelRaw = null;
        let novelId = 0;
        let insertData = {};
        let updateData = {};

        // 根据小说链接查询一条小说记录
        novelRaw = await model.novelModel.getNovelBySpiderUrls(novel.novelLink);
        if (novelRaw.length == 0) {
            novelRaw = false;
        }
        else {
            novelRaw = novelRaw[0];
            novelId = novelRaw.id;
        }

        // 如果数据库中没有该小说的记录
        if (!novelRaw) {
            insertData.name = novel.novelName;
        }

        // 如果数据中和数据库都有小说作者
        if (authorId) {
            if (!novelRaw) {
                insertData.author = authorId;
            }
            else if (novelRaw && novelRaw.author == 0) {
                updateData.author = authorId;
            }
        }

        // 如果数据中和数据库都有小说分类
        if (categoryId) {
            if (!novelRaw) {
                insertData.category = categoryId;
            }
            else if (novelRaw && novelRaw.category == 0) {
                updateData.category = categoryId;
            }
        }

        // 如果数据中有封面图片
        if (novel.novelImg) {
            if (!novelRaw) {
                insertData.cover = novel.novelImg;
            }
            else if (novelRaw && novelRaw.cover.length == 0) {
                updateData.cover = novel.novelImg
            }
        }

        // 数据中必然有小说链接
        if (!novelRaw) {
            insertData.spider_urls = novel.novelLink;
        }

        // 如果数据中有描述
        if (novel.desc) {
            if (!novelRaw) {
                insertData.introduction = novel.desc;
            }
            else if (novelRaw && novelRaw.introduction.length == 0) {
                updateData.introduction = novel.desc
            }
        }

        // 如果数据是最热
        if (novel.isHotest) {
            if (!novelRaw) {
                insertData.ishotest = novel.isHotest;
            }
            else if (novelRaw && novelRaw.ishotest == 0) {
                updateData.ishotest = novel.isHotest
            }
        }

        // 如果数据是热门
        if (novel.isHot) {
            if (!novelRaw) {
                insertData.ishot = novel.isHot;
            }
            else if (novelRaw && novelRaw.ishot == 0) {
                updateData.ishot = novel.isHot
            }
        }

        if (novelRaw) {
            if (JSON.stringify(updateData) != '{}') {
                // 执行更新
                let bool = await model.novelModel.updateNovelById(novelId, updateData);
            }
        } else {
            insertData.createtime = CREATE_TIME;
            // 执行插入
            novelId = await model.novelModel.addNovel(insertData);
        }
    }
    return ;
};

let doNovel = async function (htmlData, novelRaw) {
    const CREATE_TIME = Date.parse(new Date()) / 1000;

    let { novelInfo, chapterData  } = htmlData;
    let novelId = novelRaw.id;
    let authorRaw = null;
    let authorId = 0;

    let updateData = {};
    if (novelRaw.cover.length == 0) {
        updateData.cover = novelInfo.cover;
    }
    if (novelRaw.author == 0) {
        authorRaw = await model.authorModel.getAuthorByName(novelInfo.authorName);
        if (authorRaw.length == 0) {
            authorId = await model.authorModel.insertAuthor(novelInfo.authorName);
        }
        updateData.author = authorId;
    }
    else {
        authorId = novelRaw.author;
    }
    if (novelRaw.category == 0) {
        let categoryRaw = await model.categoryModel.getCategoryByName(novelInfo.categoryName);
        categoryRaw = categoryRaw[0];
        updateData.category = categoryRaw.id;
    }
    if (novelInfo.state != '连载中') {
        updateData.isend = 1;
    }
    updateData.text_length = novelInfo.textLength;
    if (novelRaw.introduction.length == 0) {
        updateData.introduction = novelInfo.desc;
    }
    if (JSON.stringify(updateData) != '{}') {
        // 执行更新
        let bool = await model.novelModel.updateNovelById(novelId, updateData);
    }

    let chapterGroupName = '';
    let chapterGroupRaw = {};
    let chapterGroupId = 0;
    let insertDataSql = '';

    for (let chapter of chapterData) {
        if (chapter.chapterGroupName != chapterGroupName) {
            chapterGroupRaw = await model.chapterGroupModel.getChapterGroupByNameAndNovelId(chapter.chapterGroupName, novelId);
            if (chapterGroupRaw.length == 0) {
                let chapterGroupData = {
                    name: chapter.chapterGroupName,
                    novel: novelId,
                    createtime: CREATE_TIME,
                    sort: chapter.chapterGroupSort
                };
                chapterGroupId = await model.chapterGroupModel.addChapterGroup(chapterGroupData);
            }
            else {
                chapterGroupRaw = chapterGroupRaw[0];
                chapterGroupId = chapterGroupRaw.id;
                chapterGroupName = chapterGroupRaw.name;
            }
        }

        insertDataSql = insertDataSql + '(';
        insertDataSql = insertDataSql + `(${novelRaw.id}, ${chapterGroupId}, ${authorId}, '${chapter.chapterName}', ${CREATE_TIME})`;
        insertDataSql = insertDataSql + '), ';
    }

    let returnData = await model.chapterModel.insertBatchChapter('(novel, chapter_group, author, name, createtime)', insertDataSql);

    console.log(returnData);
};


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
        let novelRaw = await model.novelModel.getNovelById(params.novelId);
        if (novelRaw.length > 0) {
            novelRaw = novelRaw[0];
            htmlContent = await spider.crawl(novelRaw.spider_urls);
            if (htmlContent) {
                console.log(htmlContent);
                //htmlData = analyser.analyzeNovel(htmlContent);
                console.log(htmlData);
            //    await doNovel(htmlData, novelRaw);
            }
        }

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
            logger.info('request a empty html content !!');
        }
        if (params.url == urlMap.homeUrl) {
            htmlData = analyser.analyzeHome(htmlContent);
            //logger.info(htmlData.hotestNovel);
            await doHomeNovelList(htmlData.hotestNovel);

            //logger.info(htmlData.veryRecommendNovel);
            await doHomeNovelList(htmlData.veryRecommendNovel);

            //logger.info(htmlData.categoryNovel);
            await doHomeNovelList(htmlData.categoryNovel);
        }

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