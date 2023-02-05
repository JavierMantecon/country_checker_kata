<?php


namespace Kata\CountryChecker\CountryChecker\Infraestructure;


use Kata\CountryChecker\CountryChecker\Domain\CountryCheck;
use Laminas\Diactoros\Response\JsonResponse;

final class CountryCheckerResponse
{
    private CountryCheck $countryCheck;

    public function __construct(CountryCheck $countryCheck)
    {
        $this->countryCheck = $countryCheck;
    }

    public function __invoke()
    {
        return [
           'result' => $this->countryCheck->result(),
            'criteria' => [
                'code' => $this->countryCheck->code(),
                'region' => $this->countryCheck->region(),
                'population' => $this->countryCheck->population(),
                'rival' => $this->countryCheck->rival()
            ]
        ];
    }


}
