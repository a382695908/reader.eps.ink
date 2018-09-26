<?php
/**
 * NAME: ErrorCode.php
 * Author: eps
 * DateTime: 9/26/2018 9:54 PM
 */
namespace app\admin\model;

class AppCode
{
    // 通用 0 - 100
    const OK = 0; // 操作成功
    const FAIL = 1; // 操作失败
    const UPDATE_FAIL = 2; // 更新失败
    const INSERT_FAIL = 3; // 插入失败
    const DELETE_FAIL = 4; // 删除失败
    const EXIT_OK = 5; // 退出成功
    const INSERT_OK = 6; // 插入成功
    const UPDATE_OK = 7; // 更新成功
    const DELETE_OK = 8; // 删除成功
    const LOGIN_OK = 9; // 登录成功

    // 请求级别的错误 100 - 300
    const IS_NOT_AJAX = 100; // 请求类型错误

    // 参数级别的错误 300 - 800
    const ADMIN_HAD_LOGIN = 300; // 管理员已登录
    const ADMIN_NOT_EXISTS = 301; // 管理员不存在
    const ADMIN_IS_EXISTS = 302; // 管理员已存在
    const PASSWORD_MATCH_FAIL = 303; // 密码匹配错误
    const LOGIN_PARAM_TYPE_ERROR = 304; // 登录参数错误
    const LOGIN_PARAM_EMPTY = 304; // 登录参数为空
    const TOKEN_TYPE_ERROR = 305; // token参数错误
    const CHECK_TOKEN_PARAM_EMPTY = 306; // 检查token数据为空
    const TOKEN_MATCH_FAIL = 307; // 非法令牌
    const LOGIN_TIME_MATCH_FAIL = 308; // 非法令牌
    const LOGIN_TIME_OVER_TIME = 309; // 请重新登录
    const ADMIN_NO_LOGIN = 310; // 管理员未登录

    public static function getText($code)
    {
        $map = [

        ];
        return isset($map[$code]) ? $map[$code] : '';
    }
}