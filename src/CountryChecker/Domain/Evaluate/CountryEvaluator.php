<?php declare(strict_types=1);

namespace Kata\CountryChecker\CountryChecker\Domain\Evaluate;

use Kata\CountryChecker\CountryChecker\Domain\Country;

final class CountryEvaluator
{
    private Country $country;
    private Country $rivalCountry;
    private string $EUROPE_REGION = 'Europe';
    private string $ASIA_REGION = 'Asia';
    private int $ASIA_MIN_POPULATION = 80000000;
    private int $OTHER_REGIONS_MIN_POPULATION = 50000000;


    public function __construct(Country $country, Country $rivalCountry)
    {
        $this->country = $country;
        $this->rivalCountry = $rivalCountry;
    }

    public function countryCodeStartsWithVowel() : bool {
        return preg_match('/^[aeiou]/i', $this->country->code()) === 1;
    }

    public function isEuropeanCountry() : bool{
        return $this->country->region() === $this->EUROPE_REGION ;
    }

    public function population() : bool{
        if ($this->country->region() === $this->ASIA_REGION) {
            return $this->country->population() >= $this->ASIA_MIN_POPULATION;
        } else {
            return $this->country->population() >= $this->OTHER_REGIONS_MIN_POPULATION;
        }
    }

    public function rival() : bool{
        return $this->country->population() > $this->rivalCountry->population();
    }
}
