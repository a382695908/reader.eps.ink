<?php
namespace app\admin\model;

use think\Model;

class Log extends Model
{

    public function log($adminId, $title, $data)
    {
        if (!$adminId) {
            return false;
        }
        $logData = [
            'admin_id'      => $adminId,
            'operate_title' => $title,
            'operate_data'  => json_encode($data),
            'create_time'   => time(),
        ];
        return $this->insert($logData, false, true);
    }

    public function logLogin($adminId, $data)
    {
        return $this->log($adminId, 'login', $data);
    }

    public function logLogout($adminId, $data)
    {
        return $this->log($adminId, 'logout', $data);
    }

    public function logEditAuthor($adminId, $data)
    {
        return $this->log($adminId, 'edit_author', $data);
    }

    public function logAddAuthor($adminId, $data)
    {
        return $this->log($adminId, 'add_author', $data);
    }

    public function logEditCategory($adminId, $data)
    {
        return $this->log($adminId, 'edit_category', $data);
    }

    public function logAddCategory($adminId, $data)
    {
        return $this->log($adminId, 'add_category', $data);
    }
}
