<?php

namespace App\Models;

use App\Models\States\BookingState\BookingState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\ModelStates\HasStates;

class Booking extends Model
{
    use HasFactory;
    use HasStates;

    protected $table = 'bookings';

    protected $fillable = [
        'state',
        'type_id',
        'type',
        'start_date',
        'end_date',
        'total',
        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'user_address',
        'user_request',
        'code',
    ];
    protected $casts = [
        'state' => BookingState::class,
    ];

    public function modelType(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'type', 'type_id','id');
    }
}
