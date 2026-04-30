<?php

namespace Database\Seeders;

use App\Models\Produit;
use App\Models\Transaction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Produit::factory(4)->create();
        Produit::factory(1)->unstocked()->create();
        Produit::factory(1)->critical()->create();
        Produit::factory(2)->create();

        Transaction::factory(10)->create();
    }
}
