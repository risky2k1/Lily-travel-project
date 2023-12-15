<?php

namespace App\Models;

use App\Models\States\HotelState\HotelState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class Hotel extends Model
{
    use HasFactory;
    use HasStates;

    protected $fillable = [
        'name',
        'description',
        'content',
        'is_feature',
        'author',
        'state',
        'map',
        'address',
    ];
    protected $casts = [
        'state' => HotelState::class,
    ];
}
