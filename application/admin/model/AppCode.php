<?php
/**
 * NAME: ErrorCode.php
 * Author: eps
 * DateTime: 9/26/2018 9:54 PM
 */
namespace app\admin\model;

class AppCode
{
    // 通用码 (0 - 99)
    const OK = 0; // 操作成功
    const FAIL = 1; // 操作失败
    const UPDATE_FAIL = 2; // 更新失败
    const INSERT_FAIL = 3; // 添加失败
    const DELETE_FAIL = 4; // 删除失败
    const EXIT_OK = 5; // 退出成功
    const INSERT_OK = 6; // 添加成功
    const UPDATE_OK = 7; // 更新成功
    const DELETE_OK = 8; // 删除成功
    const LOGIN_OK = 9; // 登录成功
    const PARAM_ERROR = 10; // 参数错误
    const REQUEST_IS_NOT_AJAX = 11; // 请求类型错误
    const TOKEN_ERROR = 12; // 非法令牌

    // 管理员
    const ADMIN_IS_LOGIN = 100; // 管理员已登录
    const ADMIN_IS_NOT_LOGIN = 101; // 管理员未登录
    const ADMIN_IS_EXISTS = 102; // 管理员已存在
    const ADMIN_IS_NOT_EXISTS = 103; // 管理员不存在
    const ADMIN_PASSWORD_MATCH_FAIL = 104; // 密码错误

    // 作者
    const AUTHOR_IS_NOT_EXISTS = 200; // 作者不存在
    const AUTHOR_IS_EXISTS = 201; // 作者已存在
    const AUTHOR_NAME_IS_EXISTS = 202; // 该作者名已存在

    public static function getText($code)
    {
        $map = [

        ];
        return isset($map[$code]) ? $map[$code] : '';
    }
}