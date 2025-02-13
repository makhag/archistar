<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnalyticRequest;
use App\Http\Requests\PropertyRequest;
use App\Jobs\CreatePropertySuburbReport;
use App\Jobs\CreatePropertySuburbReports;
use App\Models\Property;
use App\Models\PropertyAnalytic;
use App\Models\PropertySuburbReport;
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
     * @param PropertyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addProperty(PropertyRequest $request)
    {
        $property = $this->repo->getCreateProperty($request->get('guid'));
        $property->fill($request->validated());
        $property = $this->repo->saveProperty($property);

        // dispatch job to generate report data for suburb and cache summary data
        CreatePropertySuburbReport::dispatch($property->suburb);

        return response()->json([
            'success' => true,
            'property' => $property
        ]);
    }

    /**
     * @param AnalyticRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addPropertyAnalytic(AnalyticRequest $request)
    {
        // check that posted data is valid
        $validated = $request->validated();

        $property = $this->repo->getProperty($request->get('guid'));
        $analyticType = $this->repo->getAnalyticType($request->get('analytic_type'));

        // get / create PropertyAnalytic
        $propertyAnalytic = $this->repo->getPropertyAnalytic($property, $analyticType);
        $propertyAnalytic->value = $request->get('value');

        // save PropertyAnalytic
        $propertyAnalytic = $this->repo->savePropertyAnalytic($propertyAnalytic);

        // dispatch job to generate report data for suburb and cache summary data
        CreatePropertySuburbReport::dispatch($property->suburb);

        // assign property and analyticType for display purposes
        $propertyAnalytic->property = $property;
        $propertyAnalytic->analyticType = $analyticType;

        // return propertyAnalytic
        return response()->json([
            'success' => true,
            'propertyAnalytic' => $propertyAnalytic
        ]);
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
