<?php
namespace app\index\model;

use think\Model;

class User extends Model
{

    const ORIGIN_PASSWORD = '123456';

    public function getUserByUserId()
    {

    }

    public function getUserByAccount()
    {

    }

    public function getUsersByWhere()
    {

    }

    public function getUsersByJoin()
    {

    }

    public function updateUserByUserId($userId)
    {

    }


    // === BackStage Method ===
    public function updateUsersByWhere($condition = array(), $data = array())
    {

    }

    public function deleteUsersByWhere($condition = array())
    {

    }

    public function resetPasswordByUserid($userId)
    {
//        self::ORIGIN_PASSWORD;
    }

    public function resetPasswordByWhere($condition = array())
    {
//        self::ORIGIN_PASSWORD;
    }

    public function checkUserByUserId() {
        // check status
    }

    public function checkUsersByWhere() {
        // check status
    }

    public function denyUserByUserId() {
        // is black
    }

    public function denyUsersByWhere() {
        // is black
    }
}
