<?php declare(strict_types = 1);


namespace Kata\CountryChecker\CountryChecker\Domain;


use Kata\CountryChecker\CountryChecker\Domain\Evaluate\CountryEvaluator;

final class CountryCheck
{
    private bool $code;
    private bool $region;
    private bool $population;
    private bool $rival;
    private bool $result;

    public function __construct(Country $country, Country $rivalCountry)
    {
        $countryEvaluator = new CountryEvaluator($country, $rivalCountry);
        $this->code = $countryEvaluator->countryCodeStartsWithVowel();
        $this->region = $countryEvaluator->isEuropeanCountry();
        $this->population = $countryEvaluator->population();
        $this->rival = $countryEvaluator->rival();

        $this->result =
            $this->code &&
            $this->region &&
            $this->population &&
            $this->rival;
    }

    public function code(): bool
    {
        return $this->code;
    }

    public function region(): bool
    {
        return $this->region;
    }

    public function population(): bool
    {
        return $this->population;
    }

    public function rival(): bool
    {
        return $this->rival;
    }

    public function result(): bool
    {
        return $this->result;
    }
}
