<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovementTest extends TestCase
{
    /**
     * Testa a rota GET /api/v1/movements?search=Back.
     *
     * @return void
     */
    public function test_search_movements()
    {
        $movementData = [
            'name' => 'Back Squat',
            'user_name' => 'Jose',
            'personal_record_value' => 130,
            'personal_record_date' => '2021-01-03 00:00:00',
        ];

        

        
        $response = $this->getJson('/api/v1/movements?search=Back', [
            'Accept' => 'application/json',
        ]);

        
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'success',
            'data' => [
                '*' => [
                    'position',
                    'persons' => [
                        '*' => [
                            'moviment_name',
                            'user_name',
                            'personal_record_value',
                            'personal_record_date',
                        ],
                    ],
                ],
            ],
            'message',
        ]);
    }
}
