/**
 * spider.js
 * 封装的spider
 */
const superagent = require('superagent');

let spider = {};

// 请求
spider.crawl = (url) => {
    return new Promise(function (resolve, reject) {
        console.log('request '+ url + ' ...');
        superagent.get(url).end(function (error, content) {
            if (error) {
                reject(error);
            }
            else {
                console.log('request ok');
                resolve(content);
            }
        });
    });
};

module.exports = spider;
