<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Player extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }



    protected static function boot()
    {
        parent::boot();

        // UUID'nin creating olayında otomatik atanması
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }





    /* ---------------------------------------------------------------------
     *
     * --- Relations -------------------------------------------------------
     *
     */



    /* ------------------------------------------------
     *
     * --- Functions ----------------------------------
     *
     *
     *
     */
}
