<?php

namespace App\Models\States\BookingState;

use App\Models\States\BookingState\BookingState;

class Processing extends BookingState
{
    public function color(): string
    {
        return 'green';
    }

    public function class(): string
    {
        return 'bg-yellow-4 text-yellow-3';
    }

    public static $name = 'processing';
}
