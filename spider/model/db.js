const mysql = require('mysql');
const mysqlConfig = require('../config/mysql.config.js');

const pool = mysql.createPool({
    host: mysqlConfig.host,
    user: mysqlConfig.user,
    password: mysqlConfig.password,
    database: mysqlConfig.database,
    charset: mysqlConfig.charset,
    port: mysqlConfig.port,
    connectionLimit: mysqlConfig.connectionLimit
});


pool.on('connection', function (connection) {
    console.log('connect mysql ok!');
});

module.exports = pool;