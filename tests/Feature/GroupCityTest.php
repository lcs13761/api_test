<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupCityTest extends TestCase
{

     /**
     * A basic feature test example.
     *@test
     * @return void
     */
    public function getTest()
    {
        $response = $this->get('/api/grupos');
        $response->assertStatus(200);
    }
    /**
     * A basic feature test example.
     *@test
     * @return void
     */
    public function createTest()
    {
        $response = $this->json('post', "/api/adicionar/grupo", [
            'group_name' => $this->faker->name(),
            'campaign' => $this->faker->randomDigitNotNull()
        ]);

        $response->assertStatus(200);
    }
    /**
     *@test
     * @return void
     */
    public function updateTest()
    {

        $response = $this->json('put', "/api/editar/grupo/1", [
            "group_name" =>  $this->faker->name(),
            'campaign' => $this->faker->randomDigitNotNull()
        ]);

        $response->assertStatus(200);
    }

    /**
     *@test
     * @return void
     */
    public function deleteTest()
    {

        $response = $this->json('delete', "/api/remover/grupo/1");

        $response->assertStatus(423);
    }
}
