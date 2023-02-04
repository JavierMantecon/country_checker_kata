<?php declare(strict_types=1);

namespace HealthCheckController\Infraestructure;


use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

final class HealthCheckerControllerTest extends TestCase
{
    public function testItShouldGetASuccessfulResponse(): void
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8080/health-check',
            'timeout'  => 10,
        ]);
        $resp = $client->request('GET');
        $this->assertEquals("OK!",trim($resp->getBody()->getContents()));
    }
}


