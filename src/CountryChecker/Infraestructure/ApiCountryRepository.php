<?php


namespace Kata\CountryChecker\CountryChecker\Infraestructure;


use GuzzleHttp\Client;
use Kata\CountryChecker\CountryChecker\Domain\Country;
use Kata\CountryChecker\CountryChecker\Domain\CountryNotExist;
use Kata\CountryChecker\CountryChecker\Domain\CountryRepository;

final class ApiCountryRepository implements CountryRepository
{
    private int $HTTP_STATUS_OK = 200;
    public function findByCode(string $code): ?Country
    {
        $client = new Client([
            'base_uri' => 'https://restcountries.com/v3.1/alpha/',
            'timeout'  => 10,
        ]);
        $response = $client->request('GET', "?codes=$code");

        if ($response->getStatusCode() != $this->HTTP_STATUS_OK) {
            return null;
        } else {
            $responseJson = json_decode($response->getBody()->getContents(), true);
            return new Country($responseJson[0]['cca2'], $responseJson[0]['region'], $responseJson[0]['population']);
        }
    }
}
