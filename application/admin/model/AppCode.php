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

    // 请求级别的错误 100 - 300
    const IS_NOT_AJAX = 100; // 请求类型错误

    // 参数级别的错误 300 - 800
    const ADMIN_IS_LOGIN = 300; // 已登录
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

    public static function getText($code)
    {
        $map = [
            // 通用 0 - 100
            self::OK => '操作成功',//
            self::FAIL => '操作失败',//
            self::UPDATE_FAIL => '更新失败',//
            self::INSERT_FAIL => '插入失败',//
            self::DELETE_FAIL => '删除失败',//

            // 请求级别的错误 100 - 300
            self::IS_NOT_AJAX => '请求类型错误', //

            // 参数级别的错误 300 - 800
            self::ADMIN_IS_LOGIN => '已登录', //
            self::ADMIN_NOT_EXISTS => '管理员不存在', //
            self::ADMIN_IS_EXISTS => '管理员已存在', //
            self::PASSWORD_MATCH_FAIL => '密码匹配错误', //
            self::LOGIN_PARAM_TYPE_ERROR => '登录参数错误', //
            self::LOGIN_PARAM_EMPTY => '登录参数为空', //
            self::TOKEN_TYPE_ERROR => 'token参数错误', //
            self::CHECK_TOKEN_PARAM_EMPTY => '检查token数据为空', //
            self::TOKEN_MATCH_FAIL => '非法令牌', //
            self::LOGIN_TIME_MATCH_FAIL => '非法令牌', //
            self::LOGIN_TIME_OVER_TIME => '请重新登录', // ,
        ];
        return isset($map[$code]) ? $map[$code] : '';
    }
}