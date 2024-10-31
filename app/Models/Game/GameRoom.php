<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class GameRoom extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
            'uuid' => 'string',
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
            if (empty($model->invite_code)) {
                $model->invite_code = uniqueCode32();
            }
        });
    }

    /**
     * Find the model by id, uuid or invite_code.
     *
     * @param  string  $identifier
     * @return GameRoom|null
     */
    public static function findAny($identifier)
    {
        // Check if the identifier is numeric (id or invite_code) or uuid (string)
        if (is_numeric($identifier)) {
            // Try finding by id or invite_code
            return static::where('id', $identifier)
                ->first();
        }

        if (strlen($identifier) < 15) {
            return static::where('invite_code', $identifier)
                ->first();
        }

        // If not numeric, assume it's a uuid
        return static::where('uuid', $identifier)->first();
    }



}
