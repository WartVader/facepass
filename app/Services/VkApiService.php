<?php

namespace App\Services;


use App\Events\FriendsRecieved;
use VK\Client\Enums\VKLanguage;
use VK\Client\VKApiClient;

class VkApiService
{
    protected $client;
    protected $oauth;
    protected $version;
    protected $userId;
    private $accessToken;

    public function __construct()
    {
        $this->userId = config('services.vk.userId');
        $this->version = config('services.vk.version');
        $this->accessToken = config('services.vk.token');
        $this->client = new VKApiClient($this->version, VKLanguage::RUSSIAN);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function friends($id = null) {
        $friends = $this->client->friends()->get($this->accessToken, [
            'user_id' => $id ?: $this->userId,
            'fields' => [
                'contacts',
                'nickname',
                'photo_100'
            ]
        ]);
        event(new FriendsRecieved($friends));
        return $friends;
    }
}
