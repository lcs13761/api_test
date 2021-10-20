<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     *@test
     * @return void
     */
    public function getTest()
    {
        $response = $this->get('/api/cidades');
        $response->assertStatus(200);
    }

    /**
     *@test
     * @return void
     */
    public function createTest()
    {
        $response = $this->json('post', "/api/adicionar/produto", [
            'product' => $this->faker->name(),
            'campaign' =>  $this->faker->randomDigitNotNull(), 
            'value' => $this->faker->randomFloat(2,0,1000),
            'discount' =>  $this->faker->randomDigitNotNull()
        ]);
        $response->assertStatus(200);
    }

    /**
     *@test
     * @return void
     */
    public function updateTest()
    {
        $response = $this->json('put', "/api/editar/produto/2", [
        'value' => $this->faker->randomFloat(2,0,1000),
        ]);

        $response->assertStatus(200);
    }

    /**
     *@test
     * @return void
     */
    public function deleteTest()
    {
       // $response = $this->json('delete', "/api/remover/produto/8");
        //$response->assertStatus(200);
    }
}
