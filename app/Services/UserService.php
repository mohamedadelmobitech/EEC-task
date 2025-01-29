<?php


namespace App\Services;

use App\Models\Detail;

class UserService
{
    public function saveUserDetails(array $data)
    {
        Detail::updateOrCreate(
            ['user_id' => $data['user_id'] , 'key' => $data['key']],
            $data
        );
    }


    public function getGenderFromNamePrefix($prefixname)
    {
        return $prefixname == 'Mr.' || $prefixname ==  'mr.' ? 'Male' : ($prefixname == 'Ms.' || $prefixname == 'Mrs.' || $prefixname ==  'ms.' || $prefixname ==  'mrs.'    ? 'Female' : null);
    }
}
