<?php

namespace App\Jobs;

use App\Repositories\PropertyRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePropertySuburbReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string */
    private $suburb;

    /**
     * CreatePropertySuburbReport constructor.
     * @param string $suburb
     */
    public function __construct($suburb)
    {
        $this->suburb = $suburb;
    }

    /**
     * Execute the job.
     *
     * @param PropertyRepository $repo
     */
    public function handle(PropertyRepository $repo)
    {
        // count properties for suburb
        $propertyCount = $repo->getSuburbPropertyCount($this->suburb);
        // generate report data for suburb
        $reportData = $repo->getSuburbReportData($this->suburb);

        foreach ($reportData as $entry) {
            // get existing or new report object
            $report = $repo->getCreateSuburbReport($entry->suburb, $entry->analytic_type_id);
            // fill object with report data
            $report->fill($entry->toArray());
            // add property count
            $report->property_count = $propertyCount;

            $repo->saveSuburbReport($report);
        }
    }
}