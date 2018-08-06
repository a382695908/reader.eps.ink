function novel_search(e) {
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


function cookieInit() {
    // 判断是否已经初始化了
    var isInit = Cookies.get('chapter_setting');
    if (isInit) {
        return ;
    }
    setBackgroundColor(0);
    setFont(0);
    setSize(0);
    setColor(0);
    setWidth(0);
    setAutopage(0);
    setNight(0);
}

/**
 * 设置字体
 */
function setFont(isSetView) {
    if (isSetView && Cookies.get('font')) {
        $('#content').css('font', Cookies.get('font'));
        return;
    }
    var font = $('#font').val();
    $('#content').css('fontFamily', font);
    Cookies.set('font', font, {expires: 365, path: '/'});
}

/**
 * 设置字体颜色
 */
function setColor(isSetView) {
    if (isSetView && Cookies.get('color')) {
        $('#content').css('color', Cookies.get('color'));
        return;
    }
    var color = $('#color').val();
    $('#content').css('color', color);
    Cookies.set('color', color, {expires: 365, path: '/'});
}

/**
 * 设置字体大小
 */
function setSize(isSetView) {
    if (isSetView && Cookies.get('size')) {
        $('#content').css('size', Cookies.get('size'));
        return;
    }
    var size = $('#size').val();
    $('#content').css('fontSize', size);
    Cookies.set('size', size, {expires: 365, path: '/'});
}

/**
 * 设置滚屏速度
 */
function setSpeed(isSetView) {
    if (isSetView && Cookies.get('scrollspeed')) {
        $('#content').css('scrollspeed', Cookies.get('scrollspeed'));
        return;
    }
    var scrollspeed = $('#scrollspeed').val();
    Cookie.set('scrollspeed', scrollspeed, {expires: 365, path: '/'});
}

/**
 * 设置背景颜色
 */
function setBackgroundColor(isSetView) {
    if (isSetView && Cookies.get('bgcolor')) {
        $('#content').css('bgcolor', Cookies.get('bgcolor'));
        return;
    }
    var bgcolor = $('#bgcolor').val();
    $('#wrapper').css('backgroundColor', bgcolor);
    Cookies.set('bgcolor', bgcolor, {expires: 365, path: '/'});
}

/**
 * 设置宽度
 */
function setWidth(isSetView) {
    if (isSetView && Cookies.get('width')) {
        $('#content').css('width', Cookies.get('width'));
        return;
    }
    var width = $('#width').val();
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
            $('body,div,.this').css('backgroundColor', '#111111');
            $('div,a').css('color', '#999999');
            // todo: 修改导航栏
            // todo: 修改按钮样式
        }
        return;
    }

    if ($('#night').is(':checked') == true) {
        $('body,div,.this').css('backgroundColor', '#111111');
        $('div,a').css('color', '#999999');
        // todo: 修改导航栏
        // todo: 修改按钮样式
        Cookies.set('night', 1, {path: '/', expires: 365});
    } else {
        $('body,div,.this').css('backgroundColor', '');
        $('div,a').css('color', '');
        Cookies.set('night', 0, {path: '/', expires: 365});
    }
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

/**
 * 获取访客信息
 */
function logVisitorInfo() {
    var info = $('#visitor_info').text();
    info = (new Function('return ' + info))();
    $.ajax({
        url: logVisitorUrl,
        data: info
    });
}


function stopScroll() {
    clearInterval(timer);
}

function scrollwindow() {
    var speed = Cookies.get('scrollspeed');
    timer = setInterval("scrolling()", 250 / speed);
}

function scrolling() {
    var currentpos = 1;
    if (browser_is == 'chrome' | document.compatMode == 'BackCompat') {
        currentpos = document.body.scrollTop;
    } else {
        currentpos = document.documentElement.scrollTop;
    }

    window.scroll(0, ++currentpos);
    if (browser_is == 'chrome' || document.compatMode == 'BackCompat') {
        temPos = document.body.scrollTop;
    } else {
        temPos = document.documentElement.scrollTop;
    }

    if (currentpos != temPos) {
        //var autopage = Cookies.get('autopage');
        //if (autopage == 1 && /next_page/.test(document.referrer) == false) {
        //    location.href = data.next_page;
        //}
        stopScroll();
    }
}

timer = null;

$(function () {
    // logVisitorInfo();

    var ua = navigator.userAgent.toLowerCase();
    var is = (ua.match(/\b(chrome|opera|safari|msie|firefox)\b/) || ['', 'mozilla'])[1];
    browser_is = is;

    cookieInit();
    setBackgroundColor(1);
    setFont(1);
    setSize(1);
    setColor(1);
    setWidth(1);
    setAutopage(1);
    setNight(1);

    document.onmousedown = stopScroll;
    document.ondblclick = scrollwindow;
});