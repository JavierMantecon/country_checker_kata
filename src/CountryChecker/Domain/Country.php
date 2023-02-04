<?php declare(strict_types = 1);


namespace Kata\CountryChecker\CountryChecker\Domain;


final class Country
{
    private string $code;
    private string $region;
    private int $population;

    public function __construct(string $code, string $region, int $population)
    {
        $this->code = $code;
        $this->region = $region;
        $this->population = $population;
    }

    public static function create(string $code, string $region, int $population): self
    {
        $course = new self($code, $region, $population);

        return $course;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function region(): string
    {
        return $this->region;
    }

    public function population(): int
    {
        return $this->population;
    }
}
