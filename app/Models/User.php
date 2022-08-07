<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\ConsoleOutput;

class User extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vk_id',
        'full_name',
        'email',
        'photo_url',
        'vk_photo_url',
    ];

    protected static function booted()
    {
        // Ивент на создание и обновление данных. При вызове ивента будет создаваться/перезаписываться media и photo_url
        static::saved(function ($model) {
            $model->syncOriginal();
            // Проверка на наличие изменений в photo_url. Если он уже был изменен, то заново
            if (!$model->wasChanged('photo_url')) {
                $model->mediaUpdate($model);

            }
        });
    }

    protected function mediaUpdate($model) {

        $media = $model->getFirstMedia('avatar');
        if ($media) {
            $media->delete(); // Удалить media если уже есть (чтобы потом перезаписать новую)
        }
        $url = $model->addMediaFromUrl($model->vk_photo_url)->toMediaCollection('avatar')->getFullUrl();
        $model->photo_url = $url;
        $model->save();
    }
}
