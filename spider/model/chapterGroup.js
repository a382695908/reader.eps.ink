const pool = require('./db.js');
const logger = require('../lib/logger.js');

function getChapterGroupById(chapterId) {
    return new Promise(function (resolve, reject) {
        let sql = 'SELECT * FROM `r_chapter_groupr` WHERE id = ?';
        logger.info(sql + ` (${chapterId})`);
        pool.query(sql, [chapterId], function (error, results, fields) {
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
 * 根据章节组名查询章节组信息
 * @param chapterGroupName
 * @returns {Promise}
 */
function getChapterGroupByNameAndNovelId(chapterGroupName, novelId) {
    return new Promise(function (resolve, reject) {
        let sql = 'SELECT * FROM r_chapter_group WHERE name = ? AND novel = ?';
        logger.info(sql + ` (${chapterGroupName}, ${novelId})`);
        pool.query(sql, [chapterGroupName, novelId], function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                resolve(results)
            }
        });
    });
}

function addChapterGroup(data) {
    return new Promise(function (resolve, reject) {
        let sql = 'INSERT INTO `r_chapter_group` SET ?';
        logger.info(sql + ' (' + JSON.stringify(data) + ')');
        pool.query(sql, data, function (error, results, fields) {
            if (error) {
                reject(error);
            }
            else {
                logger.info('add new Novel, novelId: ' + results.insertId);
                resolve(results.insertId);
            }
        });
    });
}

module.exports = {
    getChapterGroupById,
    getChapterGroupByNameAndNovelId,
    addChapterGroup
};