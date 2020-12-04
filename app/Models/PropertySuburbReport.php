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
 * @property string $suburb
 * @property string $state
 * @property string $country
 * @property int $analytic_type_id
 * @property int $property_count
 * @property float $min_value
 * @property float $max_value
 * @property float $avg_value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property AnalyticType $analyticType
 *
 * @package App\Models
 */
class PropertySuburbReport extends Model
{
    use HasFactory;

    protected $table = 'properties';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $casts = [
        'id' => 'int',
        'suburb' => 'string',
        'state' => 'string',
        'country' => 'string',
        'analytic_type_id' => 'int',
        'property_count' => 'int',
        'min_value' => 'float',
        'max_value' => 'float',
        'avg_value' => 'float'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'suburb',
        'state',
        'country',
        'analytic_type_id',
        'property_count',
        'min_value',
        'max_value',
        'avg_value',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analyticType()
    {
        return $this->hasOne(AnalyticType::class, 'id', 'analytic_type_id');
    }
}
