const pool = require('./db.js');

function getAuthorById(authorId) {
    return new Promise(function (resolve, reject) {
        pool.query('SELECT * FROM `r_novel`', function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                resolve(results)
            }
        });
    });
}

function getAuthorByName(authorName) {
    // 嗯, 我不允许有重复作者名
    return new Promise(function (resolve, reject) {
        pool.query('SELECT * FROM `r_novel`', function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                resolve(results)
            }
        });
    });
}

module.exports = {

};