<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Shared\Domain\ValueObject\Status;

/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'curator_id' => User::factory()->create()->id,
            'email' => $this->faker->email,
            'project' => $this->faker->company,
            'status' => Status::NEW,
            'fio' => $this->faker->name
        ];
    }
}
