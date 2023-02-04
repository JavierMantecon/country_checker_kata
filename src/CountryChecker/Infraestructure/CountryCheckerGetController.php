<?php declare(strict_types=1);

namespace Kata\CountryChecker\CountryChecker\Infraestructure;

use Kata\CountryChecker\CountryChecker\Application\Find\CountryFinder;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use GuzzleHttp\Client;

final class CountryCheckerGetController
{
    private $countryFinder;
    public function __construct() {
        $this->countryFinder = new CountryFinder(new ApiCountryRepository());
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $country = $this->countryFinder->__invoke($request->getQueryParams()["code"]);
        $response->getBody()->write($country->code());

        return $response;
    }
}
