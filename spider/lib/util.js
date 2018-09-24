const fs = require('fs');
const crypto = require('crypto');
const logger = require('./logger.js');

let writeFile = function (fileName, content) {
    return new Promise(function (resolve, reject) {
        fs.writeFile(fileName, content, 'utf8', (error) => {
            if (error) {
                reject(error);
            } else {
                logger.info('文件已保存！');
                resolve(true);
            }
        });
    });
};

let md5 = function (data) {
    let hash = crypto.createHash('md5');
    return hash.update(data).digest('hex');
};


module.exports = {
    writeFile,
    md5
};