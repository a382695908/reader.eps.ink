define('/static/js/home/index', ['$'], function (require, exports, module) {
    var jquery = require('$');
    var reload = {};

    reload.init = function () {
        console.log(1);
    };
    return reload;
});