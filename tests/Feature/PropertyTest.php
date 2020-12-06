<?php

namespace Tests\Feature;

use Tests\TestCase;

class PropertyTest extends TestCase
{
    /**
     * testAddProperty
     * Testing valid data, should be saved
     */
    public function testAddProperty()
    {
        $response = $this->post('/api/properties/add', [
            'guid' => '0eb2ed60-00bb-4ad5-a872-bda1348bcbf1',
            'suburb' => 'Annandale',
            'state' => 'NSW',
            'country' => 'Australia'
        ]);

        $response->assertStatus(200);
    }

    /**
     * testAddPropertyFails
     * Testing invalid data, should not be saved
     */
    public function testAddPropertyFails()
    {
        $response = $this->post('/api/properties/add', [
            'guid' => '0eb2ed60-00bb-4ad5-a872-bda1348bcbf1',
            'suburb' => '',
            'state' => '',
            'country' => 'Australia'
        ]);

        $response->assertStatus(302);
    }

    /**
     * testAddEditPropertyAnalytic
     * Testing valid data, should be saved
     */
    public function testAddEditPropertyAnalytic()
    {
        $response = $this->post('/api/properties/analytic/add', [
            'guid' => '0eb2ed60-00bb-4ad5-a872-bda1348bcbf1',
            'analytic_type' => 'max_Bld_Height_m',
            'value' => '23'
        ]);

        $response->assertStatus(200);
    }

    /**
     * testAddEditPropertyAnalyticFails
     * Testing invalid data, should not be saved
     */
    public function testAddEditPropertyAnalyticFails()
    {
        $response = $this->post('/api/properties/analytic/add', [
            'guid' => 'max_Bld_Height_m',
            'analytic_type' => 33.2,
            'value' => '0eb2ed60-00bb-4ad5-a872-bda1348bcbf1'
        ]);

        $response->assertStatus(302);
    }
}
