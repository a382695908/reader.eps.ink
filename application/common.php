<?php

if (!function_exists('array_keyby')) {
    /**
     * array_keyby
     * @Author: eps
     * @param $arr
     * @param $key
     * @return array
     */
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
//        $keys = array_column($arr, $key);
//        return array_combine($keys, $arr);
    }
}


if (!function_exists('get_ip')) {
    /**
     * 获取请求IP
     * @Author: eps
     * @return string
     */
    function get_ip()
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
}

if (!function_exists('paginate')) {
    /**
     * 分页
     * @Author: eps
     * @return string
     */
    function paginate($currentPage, $maxPage, $categoryId)
    {
        $html = '';

        if ($currentPage > $maxPage) {
            $currentPage = $maxPage;
        }

        $html = $html . ' <a class="a-btn" href="' . url('/category/' . $categoryId . '/page/1') . '">首页</a>';
        if ($currentPage >= 1) {
            if ($currentPage > 1) {
                $html = $html . ' <a class="a-btn" href="' . url('/category/' . $categoryId . '/page/' . ($currentPage - 1)) . '">上一页</a>';
            }

            if ($currentPage < 10) {
                $startIndex = 1;
                $endIndex = 10;
            } else {
                $startIndex = $currentPage - 5;
                $endIndex = $currentPage + 5;
            }
            
            for ($index = $startIndex; $index <= $endIndex; $index++) {
                if ($index == $currentPage) {
                    $html = $html . ' <b class="a-btn a-active">' . $index . '</b>';
                } else {
                    $html = $html . ' <a class="a-btn" href="' . url('/category/' . $categoryId . '/page/' . $index) . '">' . $index . '</a>';
                }
            }
        }

        if ($maxPage > 1 && $currentPage < $maxPage) {
            $html = $html . ' <a class="a-btn" style="width:50px;" href="' . url('/category/' . $categoryId . '/page/' . ($currentPage + 1)) . '">下一页</a>';
        }
        $html = $html . ' <a class="a-btn" href="' . url('/category/' . $categoryId . '/page/' . $maxPage) . '">尾页</a>';

        return $html;
    }
}