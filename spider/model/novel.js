const pool = require('./db.js');

/**
 *
 * @param novelId
 * @returns {Promise}
 */
function getNovelById(novelId) {
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
 *
 * @param name
 * @returns {Promise}
 */
function getNovelsByName(name) {
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
 *
 * @param authorId
 * @returns {Promise}
 */
function getNovelsByAuthorId(authorId) {
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
 *
 * @param novelId
 * @param authorId
 * @returns {Promise}
 */
function getNovelByIdAndAuthorId(novelId, authorId) {
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
 *
 * @param categoryId
 * @returns {Promise}
 */
function getNovelsByCategoryId(categoryId) {
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
 *
 * @param categoryId
 * @returns {Promise}
 */
function countNovelsByCategoryId(categoryId) {
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
 *
 * @param where
 * @param field
 * @param limit
 * @param offset
 * @param orderby
 * @returns {Promise}
 */
function getNovelsByWhere(where, field, limit, offset, orderby) {
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
 * 新增小说
 * @param data
 * @returns {Promise}
 */
function addNovel(data) {
    return new Promise(function (resolve, reject) {
        let sql = 'INSERT INTO `r_novel` SET ?';
        pool.query(sql, data, function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                console.log('add new Novel, novelId: ' + results.insertId + ' data: ' + JSON.stringify(data));
                resolve(results.insertId);
            }
        });
    });
}

/**
 * getNovelByAuthorIdAndNovelName
 * @param authorId
 * @param novelName
 * @returns {Promise}
 */
function getNovelByAuthorIdAndNovelName(authorId, novelName) {
    return new Promise(function (resolve, reject) {
        let sql = 'SELECT * FROM `r_novel` WHERE author = ? AND name = ?';
        pool.query(sql, [authorId, novelName], function (error, results, fields) {
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
    getNovelById,
    getNovelsByName,
    getNovelsByAuthorId,
    getNovelByIdAndAuthorId,
    getNovelsByCategoryId,
    countNovelsByCategoryId,
    getNovelsByWhere,
    addNovel,
    getNovelByAuthorIdAndNovelName
};
