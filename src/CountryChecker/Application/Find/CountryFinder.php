<?php declare(strict_types=1);

namespace Kata\CountryChecker\CountryChecker\Application\Find;

use Kata\CountryChecker\CountryChecker\Domain\Country;
use Kata\CountryChecker\CountryChecker\Domain\CountryNotExist;
use Kata\CountryChecker\CountryChecker\Domain\CountryRepository;

final class CountryFinder
{
    public function __construct(private CountryRepository $repository)
    {

    }

    public function __invoke(String $code): Country
    {
        $country = $this->repository->findByCode($code);

        if (null === $country) {
            throw new CountryNotExist($code);
        }

        return $country;
    }
}
