<?php

namespace App\Models;

use App\Enums\AdStatus;
use App\Enums\ActivityStatus;
use App\Enums\DomainStatuses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'domains';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => DomainStatuses::class,
    ];

    /**
     * fields ordering in filteration
     */
    const ORDER = ['name'];

    /**
     * Upload Path
     */
    const UPLOADPATH = 'images/contracts/';

    /**
     * fields that will handle upload document
     */
    const UPLOADFIELDS = [];

    ##--------------------------------- RELATIONSHIPS
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function approvedAds()
    {
        return $this->hasMany(Ad::class)->where('status', AdStatus::APPROVED);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function approvedActivities()
    {
        return $this->hasMany(Activity::class)->where('status', ActivityStatus::APPROVED);
    }

    ##--------------------------------- ATTRIBUTES


    ##--------------------------------- CUSTOM FUNCTIONS


    ##--------------------------------- SCOPES
    public function scopePopular($query)
    {
        $query->where('status', '1');
    }


    ##--------------------------------- ACCESSORS & MUTATORS
}
