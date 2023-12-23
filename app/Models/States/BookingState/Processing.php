<?php

namespace App\Models\States\BookingState;

use App\Models\States\BookingState\BookingState;

class Processing extends BookingState
{
    public function color(): string
    {
        return 'green';
    }

//    public function class()
//    {
//        return 'bg-success-1 text-success-2';
//    }

    public static $name = 'processing';
}
