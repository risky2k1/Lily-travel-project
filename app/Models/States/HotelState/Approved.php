<?php

namespace App\Models\States\HotelState;

class Approved extends HotelState
{
    public function color(): string
    {
        return 'green';
    }

    public function class()
    {
        return 'bg-success-1 text-success-2';
    }

    public static $name = 'approved';
}
