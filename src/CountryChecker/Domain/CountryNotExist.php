<?php declare(strict_types = 1);



namespace Kata\CountryChecker\CountryChecker\Domain;


use Kata\CountryChecker\Shared\Domain\DomainError;

final class CountryNotExist extends DomainError
{
    protected $code;

    public function __construct(String $code)
    {
        $this->$code = $code;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'country_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The country <%s> does not exist', $this->code);
    }
}
