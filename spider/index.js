const method = require('./logic/method.js');
const spider = require('./spider.js');
const file = require('./file.js');

var start = async function () {
    let homeUrl = 'http://www.shuquge.com/';
    let htmlContent = await spider.crawl(homeUrl);
    let htmlData = method.analyzeHome(htmlContent);
    console.log(htmlData);
};

//start();

const model = require('./model/index.js');

let c = async function() {
    let d = model.cdo();
    model.end();
};
c();
