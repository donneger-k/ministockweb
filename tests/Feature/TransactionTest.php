<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Produit;
use App\Models\Transaction;
use App\Enums\TransactionType;

class TransactionTest extends TestCase
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
            'nom' => 'Transaction 1',
            'nom_produit' => $product->nom,
            'produit_id' => $product->id,
            'quantite' => 3,
            'type' => TransactionType::VENTE
        ]);

        // Refresh du modèle
        $product->refresh();

        // Assert
        $this->assertEquals(7, $product->quantite);
    }

    public function test_cannot_create_transaction_if_not_enough_stock()
    {
        // Arrange
        $product = Produit::factory()->create([
            'quantite' => 5
        ]);

        // Act
        $response = $this->post('/transaction/add', [
            'nom' => 'Transaction 1',
            'nom_produit' => $product->nom,
            'product_id' => $product->id,
            'quantite' => 10,
            'type' => TransactionType::VENTE->value
        ]);

        // Assert
        $response->assertSessionHasErrors(); // validation fail
        $this->assertDatabaseCount('transactions', 0);
        $this->assertEquals(5, $product->fresh()->quantite); // stock inchangé
    }
}
