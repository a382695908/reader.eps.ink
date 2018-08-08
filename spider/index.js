const method = require('./method.js');
const spider = require('./spider.js');
const file = require('./file.js');

var start = async function () {
    let homeUrl = 'http://www.shuquge.com/';
    let htmlContent = await spider.crawl(homeUrl);
    let htmlData = method.analyzeHome(htmlContent);
    console.log(htmlData);
};

start();