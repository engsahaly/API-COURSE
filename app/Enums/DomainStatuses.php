<?php

namespace App\Enums;

enum DomainStatuses: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public function color(): string
    {
        return match($this)
        {
            self::ACTIVE => 'bg-success',
            self::INACTIVE => 'bg-danger',
        };
    }

    public function icon(): string
    {
        return match($this)
        {
            self::ACTIVE => 'fe fe-check fe-16',
            self::INACTIVE => 'fe fe-x fe-16',
        };
    }

    public function lang(): string
    {
        return match($this)
        {
            self::ACTIVE => __('lang.active'),
            self::INACTIVE => __('lang.inactive'),
        };
    }
}
