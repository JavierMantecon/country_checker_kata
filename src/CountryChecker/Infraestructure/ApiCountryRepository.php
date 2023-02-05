<?php declare(strict_types = 1);



namespace Kata\CountryChecker\CountryChecker\Infraestructure;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Kata\CountryChecker\CountryChecker\Domain\Country;
use Kata\CountryChecker\CountryChecker\Domain\CountryNotExist;
use Kata\CountryChecker\CountryChecker\Domain\CountryRepository;

final class ApiCountryRepository implements CountryRepository
{
    public function search(string $code): ?Country
    {
        $client = new Client([
            'base_uri' => 'https://restcountries.com/v3.1/alpha/',
            'timeout'  => 10,
        ]);
        try {
            $response = $client->request('GET', "?codes=$code");
        } catch (GuzzleException $e) {
            return null;
        }

        $responseJson = json_decode($response->getBody()->getContents(), true);
        return new Country($responseJson[0]['cca2'], $responseJson[0]['region'], $responseJson[0]['population']);
    }
}
