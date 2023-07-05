<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class AreaTest extends TestCase
{

    public function test_get_areas_list()
    {
        $response = $this->get('/api/areas');
        $response->assertStatus(200);
        $response->assertSeeText('Harare CBD');
    }

    public function test_it_can_fail_to_create_an_area_if_name_is_not_given()
    {
        $response = $this->post('/api/areas');

        $response->assertStatus(302);
    }
    public function test_it_can_create_an_area_if_name_is_given()
    {
        $response = $this->post('/api/areas',['area_name'=>'New Area Name Test']);
        $response->assertSeeText('New Area Name Test');
        $response->assertStatus(201);
    }
}
