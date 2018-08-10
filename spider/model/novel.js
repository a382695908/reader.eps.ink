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

function addNovel(data) {
    return new Promise(function (resolve, reject) {

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
    addNovel
};
