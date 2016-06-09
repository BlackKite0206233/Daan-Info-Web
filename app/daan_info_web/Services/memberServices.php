<?php
//處理使用者的商業邏輯
namespace daan_info_web\Services;

use daan_info_web\Repositories\userRepositories;

use Hash;

class memberServices {

    protected $userRepositories;
    public function __construct(userRepositories $userRepositories)
    {
        $this->userRepositories = $userRepositories;
    }

    public function matchPwd($memberID,$oldPwd)
    {
        $pwd = $this->userRepositories
                    ->getPwd($memberID);

        if(Hash::check($oldPwd,$pwd))
            return true;

        return false;
    }

    public function updatePwd($memberID,$oldPwd,$newPwd,$retypePwd)
    {
        if($this->matchPwd($memberID,$oldPwd))
            if($newPwd == $retypePwd)
                if($this->userRepositories
                       ->edit($memberID, $newPwd))
                    return true;
        return false;
    }
} 