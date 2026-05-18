<?php

namespace App\Service\Page;

final class ConsultationDetailsPageService
{
    public function getPageData(): array
    {
        return [
            'consultation' => [
                'id' => '9',
                'clientName' => 'Lorem Opsum Dolor',
                'infoRows' => [
                    [
                        ['label' => 'Client:', 'value' => 'Lorem Opsum Dolor'],
                        ['label' => 'Date de naissance:', 'value' => '01/01/2000'],
                        ['label' => 'Tél:', 'value' => '00 00 00 00 00'],
                    ],
                    [
                        ['label' => 'E-mail:', 'value' => 'Lorem@email.com', 'link' => true],
                        ['label' => 'Voyant | consultant:', 'value' => 'Lorem Opsum'],
                        ['label' => 'Source:', 'value' => 'lorem'],
                    ],
                    [
                        ['label' => 'Tarif:', 'value' => '000.00€'],
                        ['label' => 'Carte Principale:', 'value' => 'xx xx xx xx xx xx xx', 'wide' => true],
                    ],
                ],
            ],
            'history' => [
                'cards' => [
                    ['label' => 'Rendez-vous', 'icon' => 'calendar-days'],
                    ['label' => 'Consultation', 'icon' => 'stethoscope'],
                    ['label' => 'Forfait', 'icon' => 'package'],
                    ['label' => 'Paiement', 'icon' => 'credit-card'],
                ],
                'badgeTitle' => 'Lorem Opsum Dolor',
                'modalRows' => [
                    [
                        'date' => '2025-12-11 08:46:00',
                        'description' => ['Lorem Opsum dolor', 'oreum'],
                        'action' => 'Lorem Opsum',
                    ],
                ],
            ],
            'rendezVous' => [
                'rows' => [
                    [
                        'date' => ['2025-12-11', '08:46:00'],
                        'status' => 'En cours',
                        'actions' => ['Reporter', 'En communication', 'Annuler'],
                    ],
                ],
            ],
            'comments' => [
                [
                    'title' => 'Consultation',
                    'rows' => [
                        [
                            'date' => ['2025-12-11', '08:46:00'],
                            'description' => 'Lorem Opsum dolor oreum',
                            'action' => 'Lorem Opsum',
                        ],
                    ],
                ],
                [
                    'title' => 'Client',
                    'rows' => [],
                ],
            ],
            'paymentMethods' => [
                'headers' => ['ID', 'Numéro', 'Crypto', 'Month', 'Year', 'Status', 'Maj'],
                'rows' => [
                    ['id' => '220', 'numberLine1' => 'xxxx xxxx xxxx', 'numberLine2' => 'xxxx', 'crypto' => '985', 'month' => '9', 'year' => '2026', 'status' => 'accepté', 'active' => false],
                    ['id' => '220', 'numberLine1' => 'xxxx xxxx xxxx', 'numberLine2' => 'xxxx', 'crypto' => '985', 'month' => '9', 'year' => '2026', 'status' => 'accepté', 'active' => true],
                    ['id' => '220', 'numberLine1' => 'xxxx xxxx xxxx', 'numberLine2' => 'xxxx', 'crypto' => '985', 'month' => '9', 'year' => '2026', 'status' => 'accepté', 'active' => false],
                    ['id' => '220', 'numberLine1' => 'xxxx xxxx xxxx', 'numberLine2' => 'xxxx', 'crypto' => '985', 'month' => '9', 'year' => '2026', 'status' => 'accepté', 'active' => false],
                ],
            ],
            'paymentTableControls' => [
                'perPage' => 3,
                'perPageOptions' => [3, 6, 12],
                'searchPlaceholder' => 'Rechercher...',
                'searchAriaLabel' => 'Rechercher un mode de paiement',
                'selectAriaLabel' => 'Nombre d’éléments de paiement affichés',
            ],
            'paymentPagination' => [
                'summary' => 'Affichage de l’élément # à # sur 12 éléments',
                'currentPage' => 1,
                'totalPages' => 12,
                'pages' => [1, 2, 3],
                'showEllipsis' => true,
                'showAllLabel' => 'Afficher tout',
            ],
        ];
    }
}
