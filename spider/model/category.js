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

function getCategoryByAlias() {
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

function getCategoryByName() {
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

module.exports = {
    getCategoryList,
    getCategoryById,
    getCategoryByAlias,
    getCategoryByName,
};