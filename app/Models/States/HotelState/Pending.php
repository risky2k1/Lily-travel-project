<?php

namespace App\Models\States\HotelState;

class Pending extends HotelState
{
    public function color(): string
    {
        return 'green';
    }
    public function class(): string
    {
        return 'bg-yellow-4 text-yellow-3';
    }
    public static $name = 'pending';
}
