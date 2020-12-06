<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\CreatePropertySuburbReport;
use App\Jobs\CreatePropertySuburbReports;
use App\Models\Property;
use App\Models\PropertyAnalytic;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /** @var PropertyRepository */
    private $repo;

    /**
     * PropertyController constructor.
     * @param PropertyRepository $repo
     */
    public function __construct(PropertyRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param string $guid
     * @return \Illuminate\Http\JsonResponse
     */
    public function propertySummary($guid)
    {
        $property = $this->repo->getPropertyWithAnalytics($guid);

        if (!empty($property)) {
            return response()->json($property);
        }

        return response()->json(['error' => 'Property not found'], 404);
    }

    /**
     * @param string $suburb
     * @return \Illuminate\Http\JsonResponse
     */
    public function suburbSummary($suburb)
    {
        $summary = $this->repo->getSuburbSummary($suburb);

        if (!empty($summary)) {
            return response()->json($summary);
        }

        return response()->json(['error' => 'Suburb not found'], 404);
    }

    /**
     * @param string $state
     * @return \Illuminate\Http\JsonResponse
     */
    public function stateSummary($state)
    {
        $summary = $this->repo->getStateSummary($state);

        if (!empty($summary)) {
            return response()->json($summary);
        }

        return response()->json(['error' => 'State not found'], 404);
    }

    /**
     * @param string $country
     * @return \Illuminate\Http\JsonResponse
     */
    public function countrySummary($country)
    {
        $summary = $this->repo->getCountrySummary($country);

        if (!empty($summary)) {
            return response()->json($summary);
        }

        return response()->json(['error' => 'Country not found'], 404);
    }
}
