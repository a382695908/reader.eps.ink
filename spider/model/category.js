const pool = require('./db.js');

function getCategoryList() {
    return new Promise(function (resolve, reject) {
        pool.query('SELECT * FROM `r_category`', function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                resolve(results)
            }
        });
    });
}

function getCategoryById() {
    return new Promise(function (resolve, reject) {
        pool.query('SELECT * FROM `r_category`', function (error, results, fields) {
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
 * @param categoryAlias
 * @returns {Promise}
 */
function getCategoryByAlias(categoryAlias) {
    return new Promise(function (resolve, reject) {
        let sql = 'SELECT * FROM `r_category` WHERE alias = ?';
        pool.query(sql, [categoryAlias], function (error, results, fields) {
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
 * @param categoryName
 * @returns {Promise}
 */
function getCategoryByName(categoryName) {
    return new Promise(function (resolve, reject) {
        let sql = 'SELECT * FROM `r_category` WHERE name = ?';
        pool.query(sql, [categoryName], function (error, results, fields) {
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
    getCategoryList,
    getCategoryById,
    getCategoryByAlias,
    getCategoryByName,
};