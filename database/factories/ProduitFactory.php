<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'Informatique' => [
                'Clavier mécanique',
                'Souris sans fil',
                'Écran 24 pouces',
                'Disque SSD 1To',
                'Câble USB-C',
            ],
            'Bureau' => [
                'Stylo bille',
                'Cahier A4',
                'Ramette de papier',
                'Classeur',
            ],
            'Hygiène' => [
                'Gel hydroalcoolique',
                'Masque chirurgical',
                'Savon liquide',
            ],
            'Alimentaire' => [
                'Bouteille d’eau',
                'Barre énergétique',
                'Café moulu',
            ],
            'Électronique' => [
                'Casque audio',
                'Chargeur secteur',
                'Batterie externe',
            ],
        ];

        $categorie = $this->faker->randomElement(array_keys($data));
        $produit = $this->faker->randomElement($data[$categorie]);


        return [
            'ref' => $this->faker->unique()->ean13(),
            'nom' => $produit,
            'categorie' => $categorie,
            'prix' => $this->faker->numberBetween(0, 100),
            'quantite' => $this->faker->numberBetween(10, 100),
            'quantite_critique' => $this->faker->numberBetween(0, 10),
        ];
    }

    public function unstocked(){
        return $this->state(function () {
            return [
                'quantite' => 0
            ];
        });
    }

    public function critical(){
        return $this->state(function () {
            $critique = $this->faker->numberBetween(10, 20);
            return [
                'quantite' => $this->faker->numberBetween(0, $critique),
                'quantite_critique' => $critique
            ];
        });
    }
}
