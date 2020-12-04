<?php
namespace App\Repositories;

use App\Models\Property;
use App\Models\PropertySuburbReport;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PropertyRepository
{
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
}