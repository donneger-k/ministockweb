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