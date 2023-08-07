<?php

namespace Tests\Feature;

use App\Http\Controllers\PriglasheniyeController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PriglasheniyeTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(
            action([
                PriglasheniyeController::class, 'create'
            ]),
            [
                'email' => $this->faker->email,
                'list' => $this->faker->name,
                'project' => $this->faker->company,
            ]
        );

        $response->assertStatus(200);
    }
}
