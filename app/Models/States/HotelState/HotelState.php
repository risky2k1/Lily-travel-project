<?php

namespace App\Models\States\HotelState;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class HotelState extends State
{
    abstract public function color(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Approved::class);
    }

}
