<?php

namespace App\Models\States\HotelState;

class Pending extends HotelState
{
    public function color(): string
    {
        return 'green';
    }

    public static $name = 'pending';
}
