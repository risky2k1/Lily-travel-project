<?php

namespace App\Models\States\HotelState;

class Approved extends HotelState
{
    public function color(): string
    {
        return 'green';
    }

    public static $name = 'approved';
}
