<?php

namespace App\Service\Page;

final class ClientPageService
{
    public function getPageData(): array
    {
        return [
            'clients' => [
                ['id' => '#0001', 'firstName' => 'Jhon', 'lastName' => 'Jhonny', 'birthDate' => '01/01/2000', 'tel' => '04 33 22 11 33'],
                ['id' => '#0002', 'firstName' => 'Jhon', 'lastName' => 'Jhonny', 'birthDate' => '01/01/2000', 'tel' => '04 33 22 11 33'],
                ['id' => '#0003', 'firstName' => 'Jhon', 'lastName' => 'Jhonny', 'birthDate' => '01/01/2000', 'tel' => '04 33 22 11 33'],
                ['id' => '#0003', 'firstName' => 'Jhon', 'lastName' => 'Jhonny', 'birthDate' => '01/01/2000', 'tel' => '04 33 22 11 33'],
            ],
            'search' => [
                'firstName' => 'Eddy',
                'lastName' => '',
                'phone' => '',
                'birthDate' => '',
            ],
            'filters' => [
                'tabs' => [
                    ['label' => 'Titre', 'active' => true],
                    ['label' => 'Titre', 'active' => false],
                    ['label' => 'Titre', 'active' => false],
                    ['label' => 'Titre', 'active' => false],
                ],
                'dateFrom' => '10-01-2026',
                'dateTo' => '10-01-2026',
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
