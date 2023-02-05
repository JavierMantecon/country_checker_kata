<?php declare(strict_types = 1);


namespace Kata\CountryChecker\CountryChecker\Infraestructure;

use Kata\CountryChecker\CountryChecker\Application\Check\CountryChecker;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class CountryCheckerGetController
{
    private $countryChecker;
    public function __construct() {
        $this->countryChecker = new CountryChecker(new ApiCountryRepository());
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $countryCheck = $this->countryChecker->__invoke($request->getQueryParams()["code"]);
        $countryCheckResponse = new CountryCheckerResponse($countryCheck);
        $response->getBody()->write(json_encode($countryCheckResponse()));
        return $response;
    }
}
