<?php

namespace Database\Factories;

use App\Models\EmpAcc;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmpAcc>
 */
class EmpAccFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmpAcc::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empuser' => $this->faker->userName(),
            'empmail' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'emppass' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'empid' => Str::uuid()->toString(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}