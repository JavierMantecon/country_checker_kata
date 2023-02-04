<?php declare(strict_types=1);

namespace Kata\CountryChecker\HealthChecker\Infraestructure;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class HealthCheckerGetController
{
    public function __invoke(Request $request, Response $response): Response
    {
        $response->getBody()->write('OK!');

        return $response;
    }
}
