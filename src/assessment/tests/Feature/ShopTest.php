<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopTest extends TestCase
{


    public function test_get_areas_list(){
        $response = $this->get('/api/shops');
        $response->assertStatus(200);
        $response->assertSeeText('Madokero');
    }

    public function test_it_can_fail_to_create_an_shop_if_name_is_not_given()
    {
        $response = $this->post('/api/shops');

        $response->assertStatus(302);
    }
    public function test_it_can_create_a_shop_if_name_is_given()
    {
        $response = $this->post('/api/shops',['area_id'=>1,'shop_name'=>'New Shop Name Test']);
        $response->assertSeeText(strtoupper('New Shop Name Test'));
        $response->assertStatus(201);
    }

}
