const pool = require('./db.js');

function insertBatchChapter(fieldSql, dataSql) {

    return new Promise(function (resolve, reject) {
        let sql = 'REPLACE INTO r_chapter ' + fieldSql + ' VALUES ' + dataSql;
        pool.query(sql, [authorName], function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                logger.info('inser a lot of chapter ok!');
                resolve(results);
            }
        });
    });
}

module.exports = {
    insertBatchChapter
};