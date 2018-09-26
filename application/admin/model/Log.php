<?php
namespace app\admin\model;

use think\Model;

class Log extends Model
{
    public function logLogin($adminId, $data)
    {
        if (!$adminId) {
            return false;
        }
        $logData = [
            'admin_id' => $adminId,
            'operate_title' => 'login',
            'operate_data' => json_encode($data),
            'create_time' => time(),
        ];
        return $this->insert($logData, false, true);
    }
}
