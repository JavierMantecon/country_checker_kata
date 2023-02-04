<?php

namespace Kata\CountryChecker\CountryChecker\Infraestructure;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class CountryCheckerController
{
    public function __invoke(Request $request, Response $response): Response
    {
        $response->getBody()->write('JSON response to be implemented');

        return $response;
    }
}
