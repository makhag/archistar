<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Property
 *
 * @property int $id
 * @property string $guid
 * @property string $suburb
 * @property string $state
 * @property string $country
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|PropertyAnalytic[] $analytics
 *
 * @package App\Models
 */
class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $casts = [
        'id' => 'int',
        'guid' => 'string',
        'suburb' => 'string',
        'state' => 'string',
        'country' => 'string'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'id',
        'guid',
        'suburb',
        'state',
        'country'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function analytics()
    {
        return $this->hasMany(PropertyAnalytic::class, 'property_id', 'id');
    }
}
