<?php

namespace Tests\Unit;

use App\Models\PropertySuburbReport;
use App\Repositories\PropertyRepository;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function testCreateSuburbReport()
    {
        /** @var PropertyRepository $repo */
        $repo = app()->make(PropertyRepository::class);
        $report = $repo->getCreateSuburbReport('Parramatta', 1);

        $this->assertTrue(($report instanceof PropertySuburbReport));
    }
}
