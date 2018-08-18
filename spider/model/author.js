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

/**
 * 根据作者名查询作者
 * @param authorName
 * @returns {Promise}
 */
function getAuthorByName(authorName) {
    return new Promise(function (resolve, reject) {
        let sql = 'SELECT * FROM r_author WHERE name = ?';
        pool.query(sql, [authorName],function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                resolve(results)
            }
        });
    });
}

/**
 * 新增作者
 * @param authorName
 * @returns {Promise}
 */
function insertAuthor(authorName) {
    return new Promise(function (resolve, reject) {
        let sql = 'INSERT INTO r_author SET name = ?';
        pool.query(sql, [authorName],function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                console.log('add new Author, {authorId: ' + results.insertId + ', name:' + authorName + '}');
                resolve(results.insertId)
            }
        });
    });
}

module.exports = {
    getAuthorById,
    getAuthorByName,
    insertAuthor
};