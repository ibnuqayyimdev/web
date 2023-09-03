<?php
namespace App\Helper;

use App\Models\User;

class Helper {
    const STATUS = [
        'NON_ACTIVE' => 0,
        'ACTIVE' => 1,
    ];

    public static function genderList($type=null){
        switch ($type) {
            case 'ARABIC':
                $genders = User::GENDER_ARABIC;
                break;

            default:
                $genders = User::GENDER;
                break;
        }

        $results = [];
        foreach ($genders as $key => $value) {
            $genderName = str_replace('_',' ',$key);
            $results[$value] = $genderName;
        }

        return $results;
    }

}
