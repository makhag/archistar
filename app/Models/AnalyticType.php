<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnalyticType
 *
 * @property int $id
 * @property string $name
 * @property string $units
 * @property boolean $is_numeric
 * @property int $num_decimal_places
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class AnalyticType extends Model
{
    use HasFactory;

    protected $table = 'analytics_types';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $casts = [
        'id' => 'int',
        'name' => 'string',
        'units' => 'string',
        'is_numeric' => 'boolean',
        'num_decimal_places' => 'int'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'id',
        'name',
        'units',
        'is_numeric',
        'num_decimal_places'
    ];
}
