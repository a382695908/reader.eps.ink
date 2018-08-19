/**
 * spider.js
 * 封装的spider
 */
const superagent = require('superagent');
const userAgents = require('../config/userAgents.js');
const logger = require('./logger.js');

let spider = {};
let header = {};
header['User-Agent'] = userAgents[parseInt(Math.random() * userAgents.length)];

logger.info('init request header ...');
logger.info(header);

// 请求
spider.crawl = (url) => {
    return new Promise(function (resolve, reject) {
        logger.info('request ' + url + ' ...');
        superagent.get(url).set(header).end(function (error, content) {
            if (error) {
                reject(error);
            }
            else {
                logger.info('request ok');
                resolve(content);
            }
        });
    });
};

module.exports = spider;
