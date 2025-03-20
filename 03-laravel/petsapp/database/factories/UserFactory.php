<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
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
        $gender = fake()->randomElement(['Male', 'Female']);

        // Generar un nombre y apellido según el género
        $firstName = $gender === 'Male' ? fake()->firstNameMale() : fake()->firstNameFemale();
        $lastName = fake()->lastName();
        $fullname = $firstName . ' ' . $lastName;

        // Extraer el primer nombre
        $name = $firstName;

        // Generar una fecha de nacimiento entre 1974 y 2004
        $birthdate = fake()->dateTimeBetween('-50 years', '-20 years')->format('Y-m-d');

        // Generar una URL de imagen aleatoria
        $photoUrl = 'https://picsum.photos/200/300'; // URL de imagen aleatoria
        $photoName = 'images/' . Str::uuid() . '.jpg'; // Nombre único para el archivo
        $photoPath = public_path($photoName);

        // Crear el directorio si no existe
        if (!file_exists(public_path('images'))) {
            mkdir(public_path('photos'), 0777, true);
        }

        // Descargar la imagen y guardarla en el directorio público
        file_put_contents($photoPath, file_get_contents($photoUrl));

        return [
            'document' => fake()->numerify('105######'),
            'fullname' => $fullname,
            'gender' => $gender,
            'birthdate' => $birthdate,
            'photo' => $photoName, // Guardar la ruta relativa de la imagen
            'phone' => fake()->numerify('320#######'),
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('12345'),
            'role' => fake()->randomElement(['client', 'admin']),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
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