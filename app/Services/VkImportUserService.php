<?php

namespace App\Services;

use App\Models\User;

class VkImportUserService
{
    static public function import($friends) {
        foreach ($friends as $friend) {
            $friend = VkUserAdapter::adapt($friend);
            try {
                User::updateOrCreate(['vk_id' => $friend['vk_id']], $friend);
            } catch (\Exception $e) {
                error_log($e->getMessage());
                continue;
            }
        }
    }
}
