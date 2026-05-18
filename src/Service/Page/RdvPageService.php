<?php

namespace App\Service\Page;

final class RdvPageService
{
    public function getPageData(): array
    {
        return [
            'statCards' => [
                [
                    'view' => 'rdv',
                    'icon' => 'calendar-days',
                    'meta' => '+15 clients',
                    'metaClass' => 'is-positive',
                    'value' => '64',
                    'label' => 'Rendez-vous du jour',
                ],
                [
                    'view' => 'echeances',
                    'icon' => 'wallet-cards',
                    'meta' => '6 non réglées',
                    'metaClass' => 'is-warning',
                    'value' => '14',
                    'label' => 'Echéances du jour',
                ],
                [
                    'icon' => 'users-round',
                    'meta' => '0.3%',
                    'metaClass' => 'is-info',
                    'submeta' => '-6 aujourd’hui',
                    'submetaClass' => 'is-warning',
                    'value' => '14',
                    'label' => 'Consultations',
                ],
                [
                    'icon' => 'euro',
                    'meta' => '15.3%',
                    'metaClass' => 'is-info',
                    'submeta' => '+1k aujourd’hui',
                    'submetaClass' => 'is-positive',
                    'value' => '3400',
                    'label' => 'Chiffre d’affaires',
                ],
            ],
            'rendezVous' => [
                [
                    'client' => 'Lorem Opsum Dolor',
                    'tel' => '04 33 22 11 33',
                    'voyant' => 'Lorem Opsum',
                    'heure' => '15:30:00',
                    'history' => ['2025/12/10 15:31:00 = création', '2025/12/10 15:30:00 = reporter'],
                    'consultant' => 'Lorem Opsum',
                    'status' => 'Reporter',
                    'statusClass' => 'is-reporter',
                    'detail' => '525',
                    'detailFilled' => false,
                ],
                [
                    'client' => 'Lorem Opsum Dolor',
                    'tel' => '04 33 22 11 33',
                    'voyant' => 'Lorem Opsum',
                    'heure' => '15:30:00',
                    'history' => ['2025/12/10 15:31:00 = création'],
                    'consultant' => 'Lorem Opsum',
                    'status' => 'En cours',
                    'statusClass' => 'is-progress',
                    'detail' => '2',
                    'detailFilled' => true,
                ],
                [
                    'client' => 'Lorem Opsum Dolor',
                    'tel' => '04 33 22 11 33',
                    'voyant' => 'Lorem Opsum',
                    'heure' => '15:30:00',
                    'history' => ['2025/12/10 15:31:00 = création', '2025/12/10 15:30:00 = reporter'],
                    'consultant' => 'Lorem Opsum',
                    'status' => 'Reporter',
                    'statusClass' => 'is-reporter',
                    'detail' => '525',
                    'detailFilled' => false,
                ],
                [
                    'client' => 'Lorem Opsum Dolor',
                    'tel' => '04 33 22 11 33',
                    'voyant' => 'Lorem Opsum',
                    'heure' => '15:30:00',
                    'history' => ['2025/12/10 15:31:00 = création', '2025/12/10 15:30:00 = reporter'],
                    'consultant' => 'Lorem Opsum',
                    'status' => 'Reporter',
                    'statusClass' => 'is-reporter',
                    'detail' => '525',
                    'detailFilled' => false,
                ],
            ],
            'echeances' => [
                [
                    'client' => 'Lorem Opsum Dolor',
                    'tel' => '04 33 22 11 33',
                    'voyant' => 'Lorem Opsum',
                    'consultant' => 'Lorem Opsum',
                    'status' => '2000€',
                    'detailFilled' => true,
                    'featured' => true,
                ],
                [
                    'client' => 'Lorem Opsum Dolor',
                    'tel' => '04 33 22 11 33',
                    'voyant' => 'Lorem Opsum',
                    'consultant' => 'Lorem Opsum',
                    'status' => '2000€',
                    'detailFilled' => false,
                ],
                [
                    'client' => 'Lorem Opsum Dolor',
                    'tel' => '04 33 22 11 33',
                    'voyant' => 'Lorem Opsum',
                    'consultant' => 'Lorem Opsum',
                    'status' => '2000€',
                    'detailFilled' => false,
                ],
                [
                    'client' => 'Lorem Opsum Dolor',
                    'tel' => '04 33 22 11 33',
                    'voyant' => 'Lorem Opsum',
                    'consultant' => 'Lorem Opsum',
                    'status' => '2000€',
                    'detailFilled' => false,
                ],
            ],
            'tableControls' => [
                'rendezVous' => [
                    'perPage' => 5,
                    'perPageOptions' => [5, 10, 25],
                    'searchPlaceholder' => 'Rechercher...',
                    'searchAriaLabel' => 'Rechercher un rendez-vous',
                ],
                'echeances' => [
                    'perPage' => 4,
                    'perPageOptions' => [4, 10, 25],
                    'searchPlaceholder' => 'Rechercher...',
                    'searchAriaLabel' => 'Rechercher une échéance',
                ],
            ],
            'pagination' => [
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
