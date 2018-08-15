seajs.config({
    base: '/static/js/',
    alias: {
        '$': 'third_party/jquery.min.js',
        'pjax': 'third_party/jquery.pjax.min.js',
        'jscookie': 'third_party/js.cookie.min.js',
    }
});


define('/static/js/entry', ['$', 'jscookie'], function (require, exports, module) {

});