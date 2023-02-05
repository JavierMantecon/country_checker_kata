<?php declare(strict_types = 1);


namespace Kata\CountryChecker\CountryChecker\Application\Check;


use Kata\CountryChecker\CountryChecker\Domain\CountryCheck;
use Kata\CountryChecker\CountryChecker\Domain\CountryRepository;
use Kata\CountryChecker\CountryChecker\Domain\Find\CountryFinder;

final class CountryChecker
{
    private string $RIVAL_COUNTRY_CODE = 'NO';
    private CountryFinder $countryFinder;
    
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryFinder = new CountryFinder($countryRepository);
    }

    public function __invoke(string $code): CountryCheck
    {
        $country = $this->countryFinder->__invoke($code);
        $rivalCountry = $this->countryFinder->__invoke($this->RIVAL_COUNTRY_CODE);
        return new CountryCheck($country, $rivalCountry);
    }
}
