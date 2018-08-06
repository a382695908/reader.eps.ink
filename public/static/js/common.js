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

}

/**
 * 获取访客信息
 */
function logVisitorInfo(url) {
    var info = $('#visitor_info').text();
    info = (new Function("return " + info))();
    $.ajax({
        url: '',
        data: info
    });
}

/**
 * 推荐本书
 */
function recommendNovel() {

}


$(function () {
    //logVisitorInfo(data.);
});
