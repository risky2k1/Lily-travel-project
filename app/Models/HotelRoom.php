<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static updateOrCreate(array $array, array $array1)
 */
class HotelRoom extends Model
{
    use HasFactory;

    protected $table = 'hotel_rooms';

    protected $fillable = [
        'hotel_id',
        'name',
        'price',
        'max_guests',
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function roomOptions(): HasMany
    {
        return $this->hasMany(HotelRoomOption::class);
    }

}
