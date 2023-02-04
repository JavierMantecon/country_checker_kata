<?php

use Slim\App;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

return function (App $app) {
    $app->get('/health-check', Kata\CountryChecker\HealthChecker\Infraestructure\HealthCheckController::class);
    $app->get('/country-check', Kata\CountryChecker\CountryChecker\Infraestructure\CountryCheckerController::class);
};
