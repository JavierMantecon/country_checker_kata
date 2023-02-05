<?php declare(strict_types = 1);

namespace Kata\CountryChecker\CountryChecker\Domain\Find;

use Kata\CountryChecker\CountryChecker\Domain\Country;
use Kata\CountryChecker\CountryChecker\Domain\CountryNotExist;
use Kata\CountryChecker\CountryChecker\Domain\CountryRepository;

final class CountryFinder
{
    public function __construct(private CountryRepository $repository)
    {

    }

    public function __invoke(string $code): Country
    {
        $country = $this->repository->search($code);

        if (null === $country) {
            throw new CountryNotExist($code);
        }

        return $country;
    }
}
