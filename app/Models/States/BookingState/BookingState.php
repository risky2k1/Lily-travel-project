<?php

namespace App\Models\States\BookingState;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class BookingState extends State
{
    abstract public function color(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Processing::class)
            ->allowTransition(Processing::class, Cancelled::class)
            ->allowTransition(Processing::class, Confirmed::class);
    }
//Processing
//Confirmed
//Cancelled
//Paid
//Completed
}
