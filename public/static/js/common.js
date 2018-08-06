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
        return;
    }

}

function setFont() {

}

function setColor() {

}

function setSize() {

}

function setSpeed() {

}

function setBackgroundColor() {

}

function setWidth() {

}

function setAutopage() {

}

function setNight() {

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
    info = (new Function("return " + info))();
    $.ajax({
        url: '',
        data: info
    });
}

$(function () {
    //logVisitorInfo(data.);
});
