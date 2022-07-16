<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\Product;
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
    public function definition()
    {
        return [
            'address'   => $this->faker->address,
            'latitude'  => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'status'    => $this->faker->randomElement(OrderStatusEnum::toArray()),
            'user_id'   => User::inRandomOrder()->value('id'),
        ];
    }

    public function configure()
    {
        $fake = $this->faker;

        return $this->afterCreating(static function (Order $order) use ($fake) {
            for ($i = 0; $i <= random_int(1, 2); $i++) {
                $order->orderItem()->create([
                                                    'product_id'     => Product::inRandomOrder()->value('id'),
                                                    'quantity'       => $fake->numberBetween(1, 40),
                                                    'price'          => $fake->numberBetween(1, 40),
                                                ]);
            }
        });
    }
}
