<?php declare(strict_types = 1);

namespace Kata\CountryChecker\CountryChecker\Domain;


interface CountryRepository
{
    public function findByCode(String $code): ?Country;
}
