const spider = require('../lib/spider.js');
const urlMap = require('../config/url.map.js');
const model = require('../model/index.js');
const analyser = require('./analyser.js');

let doNovelList = function (novelList) {
    for (let novel of novelList) {
        let authorRaw = null;
        let authorId = 0;
        // 判断数据中是否有小说作者
        if (novel.author) {
            // 从数据库中读出该作者
            authorRaw = await model.authorModel.getAuthorByName(novel.authorName);
            // 如果没有这个作者
            if (authorRaw.length == 0) {
                // 插入一条新作者
                if (novel.author) {
                    authorId = await model.authorModel.insertAuthor(novel.author);
                }
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

        // 获取到该小说的记录
        novelRaw = await model.novelModel.getNovelBySpiderUrls(novel.novelLink);

        // 如果数据库中没有该小说的记录
        if (!novelRaw) {
            insertData.novelName = novel.novelName;
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
            else if (novelRaw && novelRaw.novelImg.length == 0) {
                updateData.novelImg = novel.novelImg
            }
        }
        // 数据中必然有连接
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
            else if (novelRaw && novelRaw.ishotest.length == 0) {
                updateData.ishotest = novel.isHotest
            }
        }

        if (novelRaw) {
            // 执行更新
            let bool = await model.novelModel.updateNovelById(novelId, updateData);
        } else {
            // 执行插入
            novelId = await model.novelModel.addNovel(insertData);
        }
    }

};

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

        //console.log(htmlData.hotestNovel);
        for (let novel of htmlData.hotestNovel) {
            // 判断该作者是否存在
            let author = await model.authorModel.getAuthorByName(novel.author);
            // 如果不存在作者
            if (author.length == 0) {
                // 插入一条新数据
                let authorId = 0;
                if (novel.author) {
                    authorId = await model.authorModel.insertAuthor(novel.author);
                }

                let novelData = {
                    name: novel.novelName,
                    author: authorId,
                    spider_urls: novel.novelLink,
                    cover: novel.novelImg,
                    introduction: novel.desc,
                    ishotest: 1
                };
                let novelId = await model.novelModel.addNovel(novelData);
            }
            else {
                // 如果存在作者, 再判断该小说是否已存在
                let novelRaw = await model.novelModel.getNovelByAuthorIdAndNovelName(author[0].id, novel.novelName);
                if (novelRaw.length == 0) {
                    // 如果该小说不存在, 插入新数据
                    let novelData = {
                        name: novel.novelName,
                        author: author[0].id,
                        spider_urls: novel.novelLink,
                        cover: novel.novelImg,
                        introduction: novel.desc,
                        ishotest: 1
                    };
                    let novelId = await model.novelModel.addNovel(novelData);
                }
                else {
                    // TODO: 如果该小说存在, 判断是否需要更新
                }
            }
        }

        //console.log(htmlData.veryRecommendNovel);
        for (let novel of htmlData.veryRecommendNovel) {
            // 判断该作者是否存在
            let author = await model.authorModel.getAuthorByName(novel.author);
            let category = await model.categoryModel.getCategoryByAlias(novel.categoryAlias);

            // 如果不存在同名的作者
            if (author.length == 0) {
                // 插入一条新数据
                let authorId = 0;
                if (novel.author) {
                    authorId = await model.authorModel.insertAuthor(novel.author);
                }
                let novelData = {
                    name: novel.novelName,
                    category: category[0].id,
                    author: authorId,
                    spider_urls: novel.novelLink,
                    is_recommend: 1
                };
                let novelId = await model.novelModel.addNovel(novelData);
            }
            else {
                // 如果存在同名的作者, 再判断该小说是否已存在
                let novelRaw = await model.novelModel.getNovelByAuthorIdAndNovelName(author[0].id, novel.novelName);
                if (novelRaw.length == 0) {
                    // 如果该小说不存在, 插入新数据
                    let novelData = {
                        name: novel.novelName,
                        category: category[0].id,
                        author: author[0].id,
                        spider_urls: novel.novelLink,
                        is_recommend: 1
                    };
                    let novelId = await model.novelModel.addNovel(novelData);
                }
                else {
                    // TODO: 如果该小说存在, 判断是否需要更新
                }
            }
        }

        //console.log(htmlData.categoryNovel);
        for (let category of htmlData.categoryNovel) {
            let categoryName = category.categoryName;
            let novels = category.novels;

            let categoryRaw = await model.categoryModel.getCategoryByName(categoryName);

            for (let novel of novels) {
                // 判断该作者是否存在
                let author = await model.authorModel.getAuthorByName(novel.author);
                // 如果不存在作者
                if (author.length == 0) {
                    // 插入一条新数据
                    let authorId = 0;
                    if (novel.author) {
                        authorId = await model.authorModel.insertAuthor(novel.author);
                    }

                    let novelData = {
                        name: novel.novelName,
                        category: categoryRaw[0].id,
                        author: authorId,
                        spider_urls: novel.novelLink,
                        cover: novel.novelImg,
                        introduction: novel.desc,
                    };
                    let novelId = await model.novelModel.addNovel(novelData);
                }
                else {
                    // 如果存在作者, 再判断该小说是否已存在
                    let novelRaw = await model.novelModel.getNovelByAuthorIdAndNovelName(author[0].id, novel.novelName);
                    if (novelRaw.length == 0) {
                        // 如果该小说不存在, 插入新数据
                        let novelData = {
                            name: novel.novelName,
                            category: categoryRaw[0].id,
                            author: author[0].id,
                            spider_urls: novel.novelLink,
                            cover: novel.novelImg,
                            introduction: novel.desc,
                        };
                        let novelId = await model.novelModel.addNovel(novelData);
                    }
                    else {
                        // TODO: 如果该小说存在, 判断是否需要更新
                    }
                }
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