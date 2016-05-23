<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/5/22
 * Time: 上午 08:09
 */

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
            {
                $this->userRepositories
                     ->edit($memberID, $newPwd);
                return true;
            }
        return false;
    }
} 