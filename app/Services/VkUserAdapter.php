<?php

namespace App\Services;

class VkUserAdapter {
    static public function adapt($data)
    {
        return [
            'vk_id' => $data['id'],
            'full_name' => $data['first_name'] . ' ' . $data['last_name'],
            'vk_photo_url' => $data['photo_100'],
            'email' => null
        ];
    }
}
