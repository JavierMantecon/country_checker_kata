<?php declare(strict_types=1);

namespace Kata\CountryChecker\CountryChecker\Domain;

final class CountryCheckBuilder
{
    private Country $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }
}
