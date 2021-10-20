<?php

namespace Tests\Feature;

use Database\Factories\CampaignFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class CampaignTest extends TestCase
{

      /**
     * A basic feature test example.
     *@test
     * @return void
     */
    public function getTest()
    {
        $response = $this->get('/api/campanhas');
        $response->assertStatus(200);
    }
    /**
     * A basic feature test example.
     *@test
     * @return void
     */
    public function createTest()
    {
        $response = $this->json('post', "/api/adicionar/campanha", [
            'campaign_name' => $this->faker->name(),
            'campaign_objective' => $this->faker->name()
        ]);

        $response->assertStatus(200);
    }
    /**
     *@test
     * @return void
     */
    public function updateCampaign(){
        
        $response = $this->json('put',"/api/editar/campanha/2",[
            "campaign_objective" => ''
        ]);

        $response->assertStatus(200);
    }

     /**
     *@test
     * @return void
     */
    public function deleteCampaign(){
        
        // $response = $this->json('delete',"/api/remover/campanha/2");

        // $response->assertStatus(423);
    }




}
