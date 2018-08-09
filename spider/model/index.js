const pool = require('./db.js');

async function cdo() {
    return new Promise(function (resolve, reject) {
        pool.query('SELECT 1 + 1 AS solution', function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                resolve(results)
            }
        });
    });
}

async function end() {
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
    cdo,
    end
};