<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class PageSmokeTest extends WebTestCase
{
    public function testLoginPageLoadsWithoutSidebar(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        self::assertResponseIsSuccessful();
        self::assertSelectorNotExists('.rdv-sidebar');
    }

    public function testRdvPageLoadsWithSidebarAndRdvMarker(): void
    {
        $client = static::createClient();
        $client->request('GET', '/rdv');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('.rdv-sidebar');
        self::assertStringContainsString('data-rdv-page', $client->getResponse()->getContent());
    }

    /**
     * @dataProvider dashboardPageProvider
     */
    public function testDashboardPagesLoadWithoutRdvMarker(string $path): void
    {
        $client = static::createClient();
        $client->request('GET', $path);

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('.rdv-sidebar');
        self::assertStringNotContainsString('data-rdv-page', $client->getResponse()->getContent());
    }

    public static function dashboardPageProvider(): iterable
    {
        yield 'clients' => ['/fiche-clients'];
        yield 'consultation communication' => ['/consultation/en-communication'];
        yield 'consultation details' => ['/consultation/details'];
    }
}
