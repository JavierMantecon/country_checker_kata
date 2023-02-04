<?php declare(strict_types = 1);


namespace Kata\CountryChecker\CountryChecker\Application\Check;


use Kata\CountryChecker\CountryChecker\Domain\Country;
use Kata\CountryChecker\CountryChecker\Domain\CountryNotExist;
use Kata\CountryChecker\CountryChecker\Domain\CountryRepository;

final class CountryChecker
{
    public function __construct(private CountryRepository $repository)
    {

    }

    public function __invoke(Country $code): Country
    {
        $country = $this->repository->findByCode($code);

        if (null === $country) {
            throw new CountryNotExist($code);
        }

        return $country;
    }
}
