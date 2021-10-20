<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityTest extends TestCase
{

    /**
     * A basic feature test example.
     *@test
     * @return void
     */
    public function getTest()
    {
        $response = $this->get('/api/cidades');
        $response->assertStatus(200);
    }
    /**
     * A basic feature test example.
     *@test
     * @return void
     */
    public function createTest()
    {
        $response = $this->json('post', "/api/adicionar/cidade", [
            'city' => $this->faker->name(),
            'state' => $this->faker->stateAbbr(),
            'group_city' => $this->faker->randomDigitNotNull()
        ]);
        $response->assertStatus(200);
    }
    /**
     *@test
     * @return void
     */
    public function updateTest()
    {
        $response = $this->json('put', "/api/editar/cidade/11", [
            'state' => $this->faker->stateAbbr()
        ]);

        $response->assertStatus(200);
    }

    /**
     *@test
     * @return void
     */
    public function deleteTest()
    {
        // $response = $this->json('delete', "/api/remover/cidade/8");
        // $response->assertStatus(200);
    }
}
