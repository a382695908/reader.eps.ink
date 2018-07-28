function novel_search(e) {
    setTimeout(function () {
        console.log('request ok');
    }, 3000);
}

function login(username, password, url) {
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function() {
            alert('登录成功!');
        }
    });
}

function register(username, password, url) {
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function() {
            alert('注册成功!');
        }
    });
}


function cookieInit() {
    // 判断是否已经初始化了
    var isInit = Cookies.get('is_init');
    if (isInit) {
        return ;
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
 * 推荐本书
 */
function recommendNovel() {

}