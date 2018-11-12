define('/static/js/home/index', ['$'], function (require, exports, module) {
    var jquery = require('$');
    var reload = {};

    reload.init = function () {
        console.log('index');
    };
    return reload;
});