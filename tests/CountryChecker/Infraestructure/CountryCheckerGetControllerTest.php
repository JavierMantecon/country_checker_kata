<?php declare(strict_types=1);

namespace CountryChecker\Infraestructure;


use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

final class CountryCheckerGetControllerTest extends TestCase
{
    public function testItShouldGetASuccessfulResponse(): void
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8080/country-check',
            'timeout'  => 10,
        ]);
        $resp = $client->request('GET');
        $this->assertEquals(200,$resp->getStatusCode());
    }
}

