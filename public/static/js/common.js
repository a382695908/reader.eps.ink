/**
 * 搜索
 */
function novel_search() {
    setTimeout(function () {
        console.log('request ok');
    }, 3000);
}

/**
 * 登录
 */
function login() {
    var username = $('#username').val();
    var password = $('#password').val();
    $.ajax({
        url: data.loginUrl,
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function (data) {
            console.log(data);
            if (data.code == 0) {
                alert(data.message)
            }
            else {
                alert('登录成功!');
            }
        }
    });
}

/**
 * 注册
 */
function register() {
    var username = $('#username').val();
    var password = $('#password').val();
    $.ajax({
        url: data.registerUrl,
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function (data) {
            if (data.code == 0) {
                alert(data.message)
            }
            else {
                alert('注册成功!');
            }
        }
    });
}


/**
 * 加入书架
 */
function addIntoBookCase() {
    var novelid = $(this).attr('novelid');

    $.ajax({
        cache: false,
        url: data.addIntoBookCaseUrl,
        data: {
            novel_id: novelid
        },
        success: function (data) {
            if (data.code == '-1') {
                alert('先登录再收藏！');
            }
            else {
                alert('加入书架成功！');
            }
        }
    });
}

/**
 * 推荐本书
 */
function recommendNovel() {
    var novelid = $(this).attr('novelid');
    $.ajax({
        cache: false,
        data: {
            novel_id: novelid
        },
        url: data.recommendNovelUrl,
        success: function (data) {
            if (data.code == '-1') {
                alert('你已经推荐三次了!');
            }
            else {
                alert('推荐本书成功！');
            }
        }
    });
}

function recordVisitedChapter() {

}

function nextChapter() {

}

function lastChapter() {

}

// ---------------- 章节主题  ----------------------

function cookieInit() {
    // 判断是否已经初始化了
    var isInit = Cookies.get('is_init');
    if (isInit) {
        return;
    }
    // 章节cookie
    setFont(0);
    setColor(0);
    setSize(0);
    setSpeed(0);
    setBackgroundColor(0);
    setWidth(0);
    setAutopage(0);
    setNight(0);
    Cookies.set('is_init', 1, {expires: 365, path: '/'});
}

/**
 * 设置字体
 */
function setFont(isSetView) {
    var font = Cookies.get('font');
    if (isSetView && font) {
        $('#content').css('font', font);
        $('#font').val(font);
        return;
    }
    font = $('#font').val();
    $('#content').css('fontFamily', font);
    Cookies.set('font', font, {expires: 365, path: '/'});
}

/**
 * 设置字体颜色
 */
function setColor(isSetView) {
    var color = Cookies.get('color');
    if (isSetView && color) {
        $('#content').css('color', color);
        $('#color').val(color)
        return;
    }
    color = $('#color').val();
    $('#content').css('color', color);
    Cookies.set('color', color, {expires: 365, path: '/'});
}

/**
 * 设置字体大小
 */
function setSize(isSetView) {
    var size = Cookies.get('size');
    if (isSetView && size) {
        $('#content').css('fontSize', size);
        $('#size').val(size);
        return;
    }
    size = $('#size').val();
    $('#content').css('fontSize', size);
    Cookies.set('size', size, {expires: 365, path: '/'});
}

/**
 * 设置滚屏速度
 */
function setSpeed(isSetView) {
    var scrollspeed = Cookies.get('scrollspeed');
    if (isSetView && scrollspeed) {
        $('#content').css('scrollspeed', scrollspeed);
        $('#scrollspeed').val(scrollspeed);
        return;
    }
    scrollspeed = $('#scrollspeed').val();
    Cookies.set('scrollspeed', scrollspeed, {expires: 365, path: '/'});
}

/**
 * 设置背景颜色
 */
function setBackgroundColor(isSetView) {
    var bgcolor = Cookies.get('bgcolor');
    if (isSetView && bgcolor) {
        $('#content').css('backgroundColor', bgcolor);
        $('#bgcolor').val(bgcolor);
        return;
    }
    bgcolor = $('#bgcolor').val();
    $('#wrapper').css('backgroundColor', bgcolor);
    Cookies.set('bgcolor', bgcolor, {expires: 365, path: '/'});
}

/**
 * 设置宽度
 */
function setWidth(isSetView) {
    var width = Cookies.get('width');
    if (isSetView && width) {
        $('#content').css('width', width);
        $('#width').val(width);
        return;
    }
    width = $('#width').val();
    $('#content').css('width', width);
    Cookies.set('width', width, {expires: 365, path: '/'});
}

/**
 * 自动翻页
 */
function setAutopage(isSetView) {
    if (isSetView) {
        if (Cookies.get('autopage') == 1) {
            $('#autopage').attr('checked', true);
            scrollwindow();
        }
        return;
    }
    if ($('#autopage').is(':checked') == true) {
        $('#autopage').attr('checked', true);
        Cookies.set('autopage', 1, {expires: 365, path: '/'});
    } else {
        $('#autopage').attr('checked', false);
        Cookies.set('autopage', 0, {expires: 365, path: '/'});
    }
}

/**
 * 夜间模式
 */
function setNight(isSetView) {
    if (isSetView) {
        if (Cookies.get('night') == 1) {
            $('#night').attr('checked', true);
            $('body,div,.this').css('backgroundColor', '#111111');
            $('div,a').css('color', '#999999');
        }
        return;
    }

    if ($('#night').is(':checked') == true) {
        $('body,div,.this').css('backgroundColor', '#111111');
        $('div,a').css('color', '#999999');
        Cookies.set('night', 1, {path: '/', expires: 365});
    } else {
        $('body,div,.this').css('backgroundColor', '');
        $('div,a').css('color', '');
        Cookies.set('night', 0, {path: '/', expires: 365});
    }
}

function stopScroll() {
    clearInterval(timer);
}

function scrollwindow() {
    var speed = Cookies.get('scrollspeed');
    timer = setInterval(function () {
        scrolling()
    }, 250 / speed);
}

function scrolling() {
    window.scroll(0, ++currentpos);
    if (currentpos == temPos) {
        stopScroll();
    }
}

/*
timer = null;
currentpos = 0;
temPos = 0;
$(function () {
     logVisitorInfo();

    if (data.reading) {
        var ua = navigator.userAgent.toLowerCase();
        var is = (ua.match(/\b(chrome|opera|safari|msie|firefox)\b/) || ['', 'mozilla'])[1];
        browser_is = is;

        cookieInit();
        setFont(1);
        setColor(1);
        setSize(1);
        setSpeed(1);
        setBackgroundColor(1);
        setWidth(1);
        setAutopage(1);
        setNight(1);

        document.onmousedown = stopScroll;
        document.ondblclick = scrollwindow;
    }

});
*/

define('/static/js/common', ['$', 'jscookie'], function (require, exports, module) {
    var jquery = require('$');
    var jscookie = require('jscookie');
    var reload = {};


    reload.init = function () {

    };
    return reload;
});