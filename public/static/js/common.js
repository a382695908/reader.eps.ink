url = window.location;
url = url.toString();

if (/Android|Windows Phone|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    url = window.location.toString();
    if (url.match(/^http:\/\/www\.shuquge\.com\/$/) || url.match(/^http:\/\/www\.shuquge\.com$/)) {
        Go('http://m.shuquge.com/');
    }

    id = url.match(/\/category\/(\d+)_(\d+)\.html/);
    if (id) {
        Go('http://m.shuquge.com/sort/' + id[1] + '/0_' + id[2] + '.html');
    }

    id = url.match(/top\.html/);
    if (id) {
        Go('http://m.shuquge.com/store/');
    }

    id = url.match(/full\//);
    if (id) {
        Go('http://m.shuquge.com/quanben/1.html');
    }
    id = url.match(/full\/(\d+)\//);
    if (id) {
        Go('http://m.shuquge.com/quanben/' + id[1] + '.html');
    }

    id = url.match(/\/txt\/(\d+)\/index\.html/);
    if (id) {
        Go('http://m.shuquge.com/s/' + id[1] + '.html');
    }
    id = url.match(/\/txt\/(\d+)\/$/);
    if (id) {
        Go('http://m.shuquge.com/s/' + id[1] + '.html');
    }
    id = url.match(/\/txt\/(\d+)\/(\d+)\.html/);
    if (id) {
        Go('http://m.shuquge.com/chapter/' + id[1] + '_' + id[2] + '.html');
    }

}
function Go(url) {
    window.location = url;
}

function search() {
    document.writeln("<div class=\"search\">");
    document.writeln("	<form target=\"_blank\" action=\"http://zhannei.baidu.com/cse/search\" onsubmit=\"if(q.value==\'\'){alert(\'提示：请输入小说名称或作者名字！\');return false;}\">");
    document.writeln("	<input type=\"hidden\" name=\"s\" value=\"6445266503022880974\"><input type=\"search\" class=\"text\" name=\"q\" placeholder=\"小说名称、作者\" value=\"\" />");
    document.writeln("	<input type=\"submit\" class=\"btn\" value=\"搜 索\">");
    document.writeln("	</form>");
    document.writeln("</div>");

    if (getCookie("username")) {
        document.writeln("<div style=\"float: right;\" class=\"search\">欢迎您 " + getCookie("username") + " ，[<a href=\"/logout.php\">注销</a>]</div>");
    } else {
        var jurl = window.location.href;
        var index = jurl.lastIndexOf("jumpurl=");
        if (index > 0) {
            jurl = jurl.substr(index + 8);
        }
        document.writeln("<div style=\"float: right;\" class=\"search\">欢迎您，[<a href='/login.php?jumpurl=" + jurl + "'>登录</a>]或[<a href='/register.php?jumpurl=" + jurl + "'>注册</a>]</div>");
    }

}

function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}

$(document).ready(function () {
    $(".showall").click(function () {
        $(".noshow").toggle();
        $(".showall").html('');
    });
});

function tj() {
    document.writeln("<div style=\"display:none\">");
    document.writeln("<script src=\"https://s19.cnzz.com/z_stat.php?id=1263994285&web_id=1263994285\" language=\"JavaScript\"></script>");
    document.writeln("</div>");

// document.writeln('<script src="/ab_my/pc_pf.js" language="JavaScript"></script>');
}

function top_bar() {
    // document.writeln("<div style=\"margin:10px auto;width: 960px;\">");
    // document.writeln('<script src="/ab_res/pc/fixed/fixed.js?type=960&res_root=/ab_res&ab_key=k3"></script>');
    // document.writeln("</div>");
}

function list1() {
}
function list2() {
    // document.writeln("<div style=\"margin:10px auto;width: 930px;height: 250px;\">");
    // document.writeln("<span style=\"float:left;margin:0 5px\">");
    // document.writeln('<script src="/ab_res/pc/fixed/fixed.js?type=300&flag=0&res_root=/ab_res&ab_key=k3"></script>');
    // document.writeln("</span>");
    // document.writeln("<span style=\"float:left;margin:0 5px\">");
    // document.writeln('<script src="/ab_res/pc/fixed/fixed.js?type=300&flag=1&res_root=/ab_res&ab_key=k3"></script>');
    // document.writeln("</span>");
    // document.writeln("<span style=\"float:left;margin:0 5px\">");
    // document.writeln('<script src="/ab_res/pc/fixed/fixed.js?type=300&flag=2&res_root=/ab_res&ab_key=k3"></script>');
    // document.writeln("</span>");
    // document.writeln("</div>");
}
function list3() {
    // document.writeln("<div style=\"margin:10px auto;width: 960px;\">");
    // document.writeln('<script src="/ab_res/pc/fixed/fixed.js?type=960&res_root=/ab_res&ab_key=k3"></script>');
    // document.writeln("</div>");
}
function read1() {
}
function read2() {
    list2();
}
function read3() {
    list3();
}
function read4() {
}
function readtc() {
}