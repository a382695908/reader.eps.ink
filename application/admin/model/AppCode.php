<?php
/**
 * NAME: AppCode.php
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

    // 分类
    const CATEGORY_IS_NOT_EXISTS = 300; // 分类不存在
    const CATEGORY_NAME_IS_EXISTS = 301; // 该分类名已存在
    const CATEGORY_ALIAS_IS_EXISTS = 302; // 该分类别名已存在
    const CATEGORY_NAME_LENGTH_REQUIRE = 303; // 分类名称长度必须为4
    const CATEGORY_REQUIRE_CHINESE = 304; // 名称必须是全中文
    const CATEGORY_ALIAS_LENGTH_REQUIRE = 305; // 分类别名名称长度必须为2

    // 小说
    const NOVEL_IS_NOT_EXISTS = 400; // 小说不存在
    const NOVEL_IS_EXISTS = 401; // 小说已存在
    const NOVEL_NAME_IS_EXISTS = 402; // 小说名不存在
    const NOVEL_NAME_IS_NOT_EXISTS = 403; // 小说名已存在

    public static function getText($code)
    {
        $map = [
            // 通用码 (0 - 99)
            self::OK                            => '操作成功', // 操作成功
            self::FAIL                          => '操作失败', // 操作失败
            self::UPDATE_FAIL                   => '更新失败', // 更新失败
            self::INSERT_FAIL                   => '添加失败', // 添加失败
            self::DELETE_FAIL                   => '删除失败', // 删除失败
            self::EXIT_OK                       => '退出成功', // 退出成功
            self::INSERT_OK                     => '添加成功', // 添加成功
            self::UPDATE_OK                     => '更新成功', // 更新成功
            self::DELETE_OK                     => '删除成功', // 删除成功
            self::LOGIN_OK                      => '登录成功', // 登录成功
            self::PARAM_ERROR                   => '参数错误', // 参数错误
            self::REQUEST_IS_NOT_AJAX           => '请求类型错误', // 请求类型错误
            self::TOKEN_ERROR                   => '非法令牌', // 非法令牌

            // 管理员
            self::ADMIN_IS_LOGIN                => '管理员已登录', // 管理员已登录
            self::ADMIN_IS_NOT_LOGIN            => '管理员未登录', // 管理员未登录
            self::ADMIN_IS_EXISTS               => '管理员已存在', // 管理员已存在
            self::ADMIN_IS_NOT_EXISTS           => '管理员不存在', // 管理员不存在
            self::ADMIN_PASSWORD_MATCH_FAIL     => '密码错误', // 密码错误

            // 作者
            self::AUTHOR_IS_NOT_EXISTS          => '作者不存在', // 作者不存在
            self::AUTHOR_IS_EXISTS              => '作者已存在', // 作者已存在
            self::AUTHOR_NAME_IS_EXISTS         => '该作者名已存在', // 该作者名已存在

            // 分类
            self::CATEGORY_IS_NOT_EXISTS        => '分类不存在', // 分类不存在
            self::CATEGORY_NAME_IS_EXISTS       => '该分类名已存在', // 该分类名已存在
            self::CATEGORY_ALIAS_IS_EXISTS      => '该分类别名已存在', // 该分类别名已存在
            self::CATEGORY_NAME_LENGTH_REQUIRE  => '分类名称长度必须为4', // 分类名称长度必须为4
            self::CATEGORY_REQUIRE_CHINESE      => '名称必须是全中文', // 名称必须是全中文
            self::CATEGORY_ALIAS_LENGTH_REQUIRE => '分类别名名称长度必须为2', // 分类别名名称长度必须为2

            // 小说
            self::NOVEL_IS_NOT_EXISTS           => '小说不存在', // 小说不存在
            self::NOVEL_IS_EXISTS               => '小说已存在', // 小说已存在
            self::NOVEL_NAME_IS_EXISTS          => '小说名不存在', // 小说名不存在
            self::NOVEL_NAME_IS_NOT_EXISTS      => '小说名已存在', // 小说名已存在
        ];
        return isset($map[$code]) ? $map[$code] : '';
    }
}