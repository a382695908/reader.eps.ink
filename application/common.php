<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function array_keyby($arr, $key)
{
    $result = array();
    foreach ($arr as $val) {
        $key_value = $val[$key];
        $result[$key_value] = $val;
    }
    return $result;
//    $keys = array_column($arr, $key);
//    return array_combine($keys, $arr);
}