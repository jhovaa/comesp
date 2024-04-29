<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formulario>
 */
class FormularioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hoja_ruta' => fake()->unique()->regexify('[A-Za-z0-9]{10}'),
            'nombre_aerodromo' => fake()->word,
            'nombre_solicitante' => fake()->name,
            'ci' => fake()->unique()->randomNumber(8),
            'correo_electronico' => fake()->unique()->safeEmail(),
            'telefono' => fake()->phoneNumber(),
            'departamento' => fake()->state(),
            'municipio' => fake()->city(),
            'designador_umbral_menor_elevacion' => fake()->numberBetween(0, 90),
            'du_menor_latitud_sur_grados' => fake()->numberBetween(0, 90),
            'du_menor_latitud_sur_minutos' => fake()->numberBetween(0, 59),
            'du_menor_latitud_sur_segundos' => fake()->numberBetween(0, 59),
            'du_menor_longitud_oeste_grados' => fake()->numberBetween(0, 180),
            'du_menor_longitud_oeste_minutos' => fake()->numberBetween(0, 59),
            'du_menor_longitud_oeste_segundos' => fake()->numberBetween(0, 59),
            'designador_umbral_mayor_elevacion' => fake()->numberBetween(0, 90),
            'du_mayor_latitud_sur_grados' => fake()->numberBetween(0, 90),
            'du_mayor_latitud_sur_minutos' => fake()->numberBetween(0, 59),
            'du_mayor_latitud_sur_segundos' => fake()->numberBetween(0, 59),
            'du_mayor_longitud_oeste_grados' => fake()->numberBetween(0, 180),
            'du_mayor_longitud_oeste_minutos' => fake()->numberBetween(0, 59),
            'du_mayor_longitud_oeste_segundos' => fake()->numberBetween(0, 59),
            'elevacion_aerodromo' => fake()->randomFloat(2, 0, 100),
            'ea_latitud_sur_grados' => fake()->numberBetween(0, 90),
            'ea_latitud_sur_minutos' => fake()->numberBetween(0, 59),
            'ea_latitud_sur_segundos' => fake()->numberBetween(0, 59),
            'ea_longitud_oeste_grados' => fake()->numberBetween(0, 180),
            'ea_longitud_oeste_minutos' => fake()->numberBetween(0, 59),
            'ea_longitud_oeste_segundos' => fake()->numberBetween(0, 59),
        ];
    }
}
