<?php

namespace App\Models\States\BookingState;

class Confirmed extends BookingState
{
    public function color(): string
    {
        return 'green';
    }

    public function class()
    {
        return 'bg-success-1 text-success-2';
    }

    public static $name = 'confirmed';
}
