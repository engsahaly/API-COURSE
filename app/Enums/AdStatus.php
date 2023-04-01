<?php

namespace App\Enums;

enum AdStatus: int
{
    case REVIEW = 1;
    case APPROVED = 2;
    case CANCELLED = 3;

    public function color(): string
    {
        return match($this)
        {
            self::REVIEW => 'bg-warning',
            self::APPROVED => 'bg-success',
            self::CANCELLED => 'bg-danger',
        };
    }

    public function icon(): string
    {
        return match($this)
        {
            self::REVIEW => 'fe fe-check',
            self::APPROVED => 'fe fe-check-square',
            self::CANCELLED => 'fe fe-x',
        };
    }

    public function lang(): string
    {
        return match($this)
        {
            self::REVIEW => __('lang.review'),
            self::APPROVED => __('lang.approved'),
            self::CANCELLED => __('lang.cancelled'),
        };
    }
}
