<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Produit;

class StockTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_modify_stock_directly_on_product()
    {
        // Arrange
        $product = Produit::factory()->create([
            'quantite' => 10
        ]);

        // Act
        $response = $this->patch("/stock/edit/{$product->id}", [
            'nom' => 'Nouveau nom',
            'ref' => $product->ref,
            'categorie' => $product->categorie,
            'quantite_critique' => $product->quantite_critique,
            'prix' => $product->prix,
            'quantite' => 999 // tentative de triche
        ]);

        // Assert
        $response->assertSessionHasErrors();
        $this->assertEquals(10, $product->fresh()->quantite);
    }
}
