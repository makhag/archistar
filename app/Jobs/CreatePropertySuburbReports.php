<?php

namespace App\Jobs;

use App\Models\Property;
use App\Repositories\PropertyRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePropertySuburbReports implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @param PropertyRepository $repo
     */
    public function handle(PropertyRepository $repo)
    {
        $suburbs = $repo->getSuburbs();

        /** @var Property $suburb */
        foreach ($suburbs as $suburb) {
            CreatePropertySuburbReport::dispatch($suburb->suburb);
        }
    }
}
