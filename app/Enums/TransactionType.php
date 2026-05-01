<?php

namespace App\Enums;

enum TransactionType: string
{
    case ACHAT = 'achat';
    case VENTE = 'vente';
    case DON_RECU = 'don_recu';
    case DON_ENVOYE = 'don_envoye';

    // Optionnel : label lisible
    public function label(): string
    {
        return match($this) {
            self::ACHAT => 'Achat',
            self::VENTE => 'Vente',
            self::DON_RECU => 'Don reçu',
            self::DON_ENVOYE => 'Don envoyé',
        };
    }
    
    public function color(): string
    {
        return match($this) {
            self::ACHAT => 'rgba(40, 167, 69, 0.7)',
            self::DON_RECU => 'rgba(32, 123, 53, 0.7)',
            self::VENTE => 'rgba(220, 53, 69, 0.7)',
            self::DON_ENVOYE => 'rgba(165, 43, 55, 0.7)',
        };
    }

    public function isEntree(): bool
    {
        return in_array($this, [
            self::ACHAT,
            self::DON_RECU,
        ]);
    }

    public function isSortie(): bool
    {
        return in_array($this, [
            self::VENTE,
            self::DON_ENVOYE,
        ]);
    }
}