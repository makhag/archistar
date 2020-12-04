<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyAnalytic;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function test()
    {
//        /** @var Property $property */
//        $property = Property::find(2);
//        dd($property->analytics->toArray());

        /** @var PropertyAnalytic $propertyAnalytic */
        $propertyAnalytic = PropertyAnalytic::find(14);
        dd($propertyAnalytic->analyticType->toArray());
    }
}
