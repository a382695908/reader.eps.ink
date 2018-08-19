let config = {
    appenders: {
        logger: {
            type: 'file',
            filename: './logs/logger.log',
            //maxLogSize: 204800,
        }
    },
    categories: {
        'default': {
            appenders: ['logger'],
            level: 'info'
        }
    }
};


module.exports = config;