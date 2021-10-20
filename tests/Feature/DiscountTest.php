<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DiscountTest extends TestCase
{

    /**
     *@test
     * @return void
     */
    public function getTest()
    {
        $response = $this->get('/api/descontos');
        $response->assertStatus(200);
    }

    /**
     *@test
     * @return void
     */
    public function createTest()
    {
        $response = $this->json('post', "/api/adicionar/desconto", [
            'discount' =>  $this->faker->numberBetween($min = 0, $max = 100)
        ]);
        $response->assertStatus(200);
    }

    /**
     *@test
     * @return void
     */
    public function updateTest()
    {
        $response = $this->json('put', "/api/editar/desconto/2", [
            'discount' => $this->faker->numberBetween($min = 0, $max = 100),
        ]);

        $response->assertStatus(200);
    }

    /**
     *@test
     * @return void
     */
    public function deleteTest()
    {
        // $response = $this->json('delete', "/api/remover/desconto/1");
        // $response->assertStatus(200);
    }
}
