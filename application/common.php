<?php

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
    $ips = [];
    $ips['HTTP_CLIENT_IP'] = (!empty($_SERVER['HTTP_CLIENT_IP'])) ? $_SERVER['HTTP_CLIENT_IP'] : '';
    $ips['HTTP_X_FORWARDED_FOR'] = (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '';
    $ips['REMOTE_ADDR'] = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '';

    if (!$ips['REMOTE_ADDR']) {
        $ip = $ips['HTTP_CLIENT_IP'] ? $ips['HTTP_CLIENT_IP'] : $ips['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $ips['REMOTE_ADDR'];
    }

    return $ip;
}