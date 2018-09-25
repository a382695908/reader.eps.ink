<?php
namespace app\admin\model;

use think\Model;

class Novel extends Model
{
    public function addNovel($data = array())
    {
        $data['create_time'] = time();
        return $this->insert($data, true, true);
    }

    public function updateNovel($data = array(), $where = array())
    {
        $data['update_time'] = time();
        return $this->update($data, $where);
    }
}
