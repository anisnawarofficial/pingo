<?php

namespace App\Service\Page;

final class ConsultationListPageService
{
    public function getPageData(): array
    {
        return [
            'rows' => [
                [
                    'id' => '525',
                    'startedAt' => '11/12 11:39:35',
                    'since' => '02h54m',
                    'client' => 'Lore Opsum',
                    'birthDate' => '08/10/1993',
                    'tel' => '00 00 00 00 00',
                    'voyant' => 'Lorem',
                    'consultant' => 'Lorem',
                    'filled' => false,
                ],
                [
                    'id' => '9',
                    'startedAt' => '11/12 11:39:35',
                    'since' => '02h54m',
                    'client' => 'Lore Opsum',
                    'birthDate' => '08/10/1993',
                    'tel' => '00 00 00 00 00',
                    'voyant' => 'Lorem',
                    'consultant' => 'Lorem',
                    'filled' => true,
                    'featured' => true,
                ],
                [
                    'id' => '32',
                    'startedAt' => '11/12 11:39:35',
                    'since' => '02h54m',
                    'client' => 'Lore Opsum',
                    'birthDate' => '08/10/1993',
                    'tel' => '00 00 00 00 00',
                    'voyant' => 'Lorem',
                    'consultant' => 'Lorem',
                    'filled' => false,
                ],
                [
                    'id' => '25',
                    'startedAt' => '11/12 11:39:35',
                    'since' => '02h54m',
                    'client' => 'Lore Opsum',
                    'birthDate' => '08/10/1993',
                    'tel' => '00 00 00 00 00',
                    'voyant' => 'Lorem',
                    'consultant' => 'Lorem',
                    'filled' => false,
                ],
                [
                    'id' => '423',
                    'startedAt' => '11/12 11:39:35',
                    'since' => '02h54m',
                    'client' => 'Lore Opsum',
                    'birthDate' => '08/10/1993',
                    'tel' => '00 00 00 00 00',
                    'voyant' => 'Lorem',
                    'consultant' => 'Lorem',
                    'filled' => false,
                ],
            ],
            'tableControls' => [
                'perPage' => 6,
                'perPageOptions' => [6, 10, 25],
                'searchPlaceholder' => 'Rechercher...',
                'searchAriaLabel' => 'Rechercher une consultation',
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
