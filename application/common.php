<?php

// 应用公共文件
function array_keyby($arr, $key)
{
    if (empty($arr)) {
        return [];
    }
    $result = array();
    foreach ($arr as $val) {
        $key_value = $val[$key];
        $result[$key_value] = $val;
    }
    return $result;
//    $keys = array_column($arr, $key);
//    return array_combine($keys, $arr);
}

function getIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else if (!empty($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    else {
        $ip = '';
    }
    preg_match('/[\d\.]{7,15}/', $ip, $ips);
//    $ip = isset($ips[0]) ? $ips[0] : 'unknown';
    $ip = isset($ips[0]) ? $ips[0] : '';
    unset($ips);

    return $ip;
}