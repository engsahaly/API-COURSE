<?php

namespace App\Enums;

enum MessageStatuses: int
{
    case SEEN = 1;
    case UNSEEN = 0;

    public function color(): string
    {
        return match($this)
        {
            self::SEEN => 'bg-success',
            self::UNSEEN => 'bg-danger',
        };
    }

    public function icon(): string
    {
        return match($this)
        {
            self::SEEN => 'fe fe-eye fe-13',
            self::UNSEEN => 'fe fe-eye-off fe-13',
        };
    }

    public function lang(): string
    {
        return match($this)
        {
            self::SEEN => __('lang.seen'),
            self::UNSEEN => __('lang.unseen'),
        };
    }
}
