<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyAnalytic
 *
 * @property int $id
 * @property int $property_id
 * @property int $analytic_type_id
 * @property float $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Property $property
 * @property AnalyticType $analyticType
 *
 * @package App\Models
 */
class PropertyAnalytic extends Model
{
    use HasFactory;

    protected $table = 'property_analytics';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $casts = [
        'id' => 'int',
        'property_id' => 'int',
        'analytic_type_id' => 'int',
        'value' => 'float',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function property()
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analyticType()
    {
        return $this->hasOne(AnalyticType::class, 'id', 'analytic_type_id');
    }
}
