const log4js = require('log4js');
const log4js_config = require('../config/log4js.config.js');

log4js.configure(log4js_config);
let logger = log4js.getLogger('logger');

module.exports = logger;