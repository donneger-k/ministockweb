<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Produit;
use App\Models\Transaction;
use App\Enums\TransactionType;

class TransactionUpdatesStockTest extends TestCase
{
    use RefreshDatabase;

    public function test_transaction_updates_product_stock()
    {
        // Arrange
        $product = Produit::factory()->create([
            'quantite' => 10
        ]);

        // Act
        Transaction::factory()->create([
            'produit_id' => $product->id,
            'quantite' => 3,
            'type' => TransactionType::VENTE
        ]);

        // Refresh du modèle
        $product->refresh();

        // Assert
        $this->assertEquals(7, $product->quantite);
    }
}
