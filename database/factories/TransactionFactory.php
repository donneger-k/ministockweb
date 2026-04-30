<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\TransactionType as TypeEnum;
use App\Models\Produit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $produit = Produit::inRandomOrder()->first();

        return [
            'nom' => $this->faker->sentence(3),
            'commentaire' => $this->faker->optional()->sentence(),
            'quantite' => $this->faker->numberBetween(1, 20),

            'produit_id' => $produit->id,
            'nom_produit' => $produit->nom,

            'type' => $this->faker->randomElement(TypeEnum::cases())->value,
        ];
    }
}
