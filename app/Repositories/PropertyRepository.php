<?php
namespace App\Repositories;

use App\Models\AnalyticType;
use App\Models\Property;
use App\Models\PropertyAnalytic;
use App\Models\PropertySuburbReport;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyRepository
{
    /**
     * @param string $guid
     * @param bool $fromCache
     * @return Property
     */
    public function getProperty($guid, $fromCache = true)
    {
        $cacheKey = 'property_' .$guid;

        if (!$fromCache || !Cache::has($cacheKey)) {
            /** @var Property $property */
            $property = Property::where('guid', $guid)->first();

            if (!empty($property)) {
                Cache::put($cacheKey, $property->toArray());
            }
        }

        return new Property(Cache::get($cacheKey));
    }

    /**
     * @param string $guid
     * @return Property
     */
    public function getPropertyWithAnalytics($guid)
    {
        return Property::where('guid', $guid)->with('analytics')->first();
    }

    /**
     * @param Property $property
     * @return Property
     */
    public function saveProperty(Property $property)
    {
        $property->guid = empty($property->guid) ? (string) Str::uuid() : $property->guid;
        $property->created_at = empty($property->created_at) ? Carbon::now() : $property->created_at;
        $property->updated_at = Carbon::now();
        $property->save();

        return $property;
    }

    /**
     * @param string $name
     * @param bool $fromCache
     * @return AnalyticType
     */
    public function getAnalyticType($name, $fromCache = true)
    {
        $cacheKey = 'analytic_' .$name;

        if (!$fromCache || !Cache::has($cacheKey)) {
            /** @var AnalyticType $property */
            $analyticType = AnalyticType::where('name', $name)->first();

            if (!empty($analyticType)) {
                Cache::put($cacheKey, $analyticType->toArray());
            }
        }

        return new AnalyticType(Cache::get($cacheKey));
    }

    /**
     * @param Property $property
     * @param AnalyticType $analyticType
     * @return PropertyAnalytic
     */
    public function getPropertyAnalytic(Property $property, AnalyticType $analyticType)
    {
        return PropertyAnalytic::firstOrNew([
            'property_id' => $property->id,
            'analytic_type_id' => $analyticType->id
        ]);
    }

    /**
     * @param PropertyAnalytic $propertyAnalytic
     * @return PropertyAnalytic
     */
    public function savePropertyAnalytic(PropertyAnalytic $propertyAnalytic)
    {
        $propertyAnalytic->created_at = empty($propertyAnalytic->created_at) ? Carbon::now() : $propertyAnalytic->created_at;
        $propertyAnalytic->updated_at = Carbon::now();
        $propertyAnalytic->save();

        return $propertyAnalytic;
    }

    /**
     * @param string $suburb
     * @return Collection
     */
    public function getSuburbReportData($suburb)
    {
        return Property::from('properties as p')
            ->join('property_analytics as pa', 'p.id', '=', 'pa.property_id')
            ->where('p.suburb', $suburb)
            ->groupBy(['pa.analytic_type_id', 'p.suburb', 'p.state', 'p.country'])
            ->get([
                'p.suburb',
                'p.state',
                'p.country',
                'pa.analytic_type_id',
                DB::raw('count(*) as analytic_count'),
                DB::raw('min(cast(pa.value as decimal)) as min_value'),
                DB::raw('max(cast(pa.value as decimal)) as max_value'),
                DB::raw('avg(cast(pa.value as decimal)) as avg_value')
            ]);
    }

    /**
     * @param $suburb
     * @return int
     */
    public function getSuburbPropertyCount($suburb)
    {
        return Property::where('suburb', $suburb)->count();
    }

    /**
     * @param string $suburb
     * @param int $analyticTypeId
     * @return PropertySuburbReport
     */
    public function getCreateSuburbReport($suburb, $analyticTypeId)
    {
        return PropertySuburbReport::firstOrNew([
            'suburb' => $suburb,
            'analytic_type_id' => $analyticTypeId
        ]);
    }

    /**
     * @param PropertySuburbReport $report
     * @return bool
     */
    public function saveSuburbReport(PropertySuburbReport $report)
    {
        if (empty($report->id)) {
            $report->created_at = Carbon::now();
        }

        $report->updated_at = Carbon::now();

        return $report->save();
    }

    /**
     * @return Collection
     */
    public function getSuburbs()
    {
        return Property::groupBy(['suburb', 'state', 'country'])->get([
            'suburb',
            'state',
            'country'
        ]);
    }

    /**
     * @param string $suburb
     * @param bool $fromCache
     * @return array|null
     */
    public function getSuburbSummary($suburb, $fromCache = true)
    {
        $cacheKey = 'suburb_' .strtolower($suburb);

        if (!$fromCache || !Cache::has($cacheKey)) {

            $reportData = [];

            $data = PropertySuburbReport::from('property_suburb_report as r')
                ->join('analytics_types as t', 'r.analytic_type_id', '=', 't.id')
                ->where('r.suburb', $suburb)
                ->get([
                    'r.suburb',
                    'r.state',
                    'r.country',
                    'r.analytic_type_id',
                    't.name as analytic_type',
                    'r.min_value',
                    'r.max_value',
                    'r.avg_value as median_value',
                    'r.property_count',
                    'r.analytic_count',
                    DB::raw('round((r.analytic_count / r.property_count) * 100, 2) as percentage_properties_with_a_value'),
                    DB::raw('round(((r.property_count - r.analytic_count) / r.property_count) * 100, 2) as percentage_properties_without_a_value')
                ]);

            /** @var PropertySuburbReport $report */
            foreach ($data as $report) {
                $reportData[] = $report->toArray();
            }

            if (!empty($reportData)) {
                Cache::put($cacheKey, $reportData);
            }
        }

        return Cache::get($cacheKey);
    }

    /**
     * @param string $state
     * @param bool $fromCache
     * @return array|null
     */
    public function getStateSummary($state, $fromCache = true)
    {
        $cacheKey = 'state_' .strtolower($state);

        if (!$fromCache || !Cache::has($cacheKey)) {

            $reportData = [];

            $data = PropertySuburbReport::from('property_suburb_report as r')
                ->join('analytics_types as t', 'r.analytic_type_id', '=', 't.id')
                ->where('r.state', $state)
                ->groupBy(['r.analytic_type_id', 'r.state', 'r.country', 't.name'])
                ->get([
                    'r.state',
                    'r.country',
                    'r.analytic_type_id',
                    't.name as analytic_type',
                    DB::raw('min(r.min_value) as min_value'),
                    DB::raw('max(r.max_value) as max_value'),
                    DB::raw('avg(r.avg_value) as median_value'),
                    DB::raw('sum(r.property_count) as property_count'),
                    DB::raw('sum(r.analytic_count) as analytic_count'),
                    DB::raw('round((sum(r.analytic_count) / sum(r.property_count)) * 100, 2) as percentage_properties_with_a_value'),
                    DB::raw('round(((sum(r.property_count) - sum(r.analytic_count)) / sum(r.property_count)) * 100, 2) as percentage_properties_without_a_value')
                ]);

            /** @var PropertySuburbReport $report */
            foreach ($data as $report) {
                $reportData[] = $report->toArray();
            }

            if (!empty($reportData)) {
                Cache::put($cacheKey, $reportData);
            }
        }

        return Cache::get($cacheKey);
    }

    /**
     * @param string $country
     * @param bool $fromCache
     * @return array|null
     */
    public function getCountrySummary($country, $fromCache = true)
    {
        $cacheKey = 'country_' .strtolower($country);

        if (!$fromCache || !Cache::has($cacheKey)) {

            $reportData = [];

            $data = PropertySuburbReport::from('property_suburb_report as r')
                ->join('analytics_types as t', 'r.analytic_type_id', '=', 't.id')
                ->where('r.country', $country)
                ->groupBy(['r.analytic_type_id', 'r.country', 't.name'])
                ->get([
                    'r.country',
                    'r.analytic_type_id',
                    't.name as analytic_type',
                    DB::raw('min(r.min_value) as min_value'),
                    DB::raw('max(r.max_value) as max_value'),
                    DB::raw('avg(r.avg_value) as median_value'),
                    DB::raw('sum(r.property_count) as property_count'),
                    DB::raw('sum(r.analytic_count) as analytic_count'),
                    DB::raw('round((sum(r.analytic_count) / sum(r.property_count)) * 100, 2) as percentage_properties_with_a_value'),
                    DB::raw('round(((sum(r.property_count) - sum(r.analytic_count)) / sum(r.property_count)) * 100, 2) as percentage_properties_without_a_value')
                ]);

            /** @var PropertySuburbReport $report */
            foreach ($data as $report) {
                $reportData[] = $report->toArray();
            }

            if (!empty($reportData)) {
                Cache::put($cacheKey, $reportData);
            }
        }

        return Cache::get($cacheKey);
    }
}