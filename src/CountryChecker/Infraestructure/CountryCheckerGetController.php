<?php declare(strict_types=1);

namespace Kata\CountryChecker\CountryChecker\Infraestructure;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use GuzzleHttp\Client;

final class CountryCheckerGetController
{
    public function __invoke(Request $request, Response $response): Response
    {
        $client = new Client([
            'base_uri' => 'https://restcountries.com/v3.1/alpha/',
            'timeout'  => 10,
        ]);
        $resp = $client->request('GET', '?codes=ES');
        $response->getBody()->write($resp->getBody()->getContents());

        return $response;
    }
}
