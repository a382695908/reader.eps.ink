const pool = require('./db.js');

let authorModel = require('./author.js');
let categoryModel = require('./category.js');
let chapterModel = require('./chapter.js');
let chapterGroupModel = require('./chapterGroup.js');
let novelModel = require('./novel.js');

function closePool() {
    return new Promise(function (resolve, reject) {
        pool.end(function (error) {
            if (error) {
                reject(err);
            }
            else {
                console.log('all connections in the pool have ended');
                resolve(true)
            }
        });
    });
}

module.exports = {
    authorModel,
    categoryModel,
    chapterModel,
    chapterGroupModel,
    novelModel,
    closePool
};