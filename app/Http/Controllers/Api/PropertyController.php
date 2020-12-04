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

    public function test()
    {
//        CreatePropertySuburbReport::dispatchNow('Parramatta');
////        $reports = $this->repo->suburbReports('Parramatta');
////        dd($reports);
///
        CreatePropertySuburbReports::dispatch();
    }
}
