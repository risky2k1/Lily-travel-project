<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static updateOrCreate(array $array, array $array1)
 */
class HotelRoomOption extends Model
{
    use HasFactory;

    protected $table = 'hotel_room_options';

    protected $fillable = [
        'hotel_room_id',
        'name',
    ];
    public function room(): BelongsTo
    {
        return $this->belongsTo(HotelRoom::class);
    }

}
