<?php
namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    public function getAdminByAccount($account)
    {
        $row = $this->where('account', $account)->find();
        return empty($row) ? [] : $row;
    }

    public function updateByAdminId($adminId, $data)
    {
        return $this->where('admin_id', $adminId)->update($data);
    }
}
