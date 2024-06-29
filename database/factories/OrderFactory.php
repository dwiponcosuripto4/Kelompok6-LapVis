<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Order::class;
    
    public function definition(): array
    {
        return [
            'todo_id' => Todo::factory()->create()->id, // Membuat todo baru dan menggunakan id-nya
            'user_id' => User::factory()->create()->id, // Membuat user baru dan menggunakan id-nya
            'date' => $this->faker->date(),
            'is_completed' => $this->faker->boolean(50), // Menentukan secara acak completed atau tidak
        ];
    }
}
