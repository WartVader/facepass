<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'vk_id' => $this->vk_id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'photo_url' => $this->photo_url,
            'vk_photo_url' => $this->vk_photo_url
        ];
    }
}
