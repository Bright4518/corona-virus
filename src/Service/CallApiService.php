<?php

namespace App\Service;

use PhpParser\Node\Expr\Cast\Array_;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{

    private $client;

    public function __construct(HttpClientInterface  $client)
    {
        $this->client = $client;
    }

    public function getFranceData(): array
    {
        return  $this->getApi('FranceLiveGlobalData');
    }

    public function getAllData(): array
    {
        return $this->getApi('AllLiveData');
    }

    public function getDepartmentData($department): array
    {
        return $this->getApi('LiveDataByDepartement?Departement=' . $department);
    }

    public function getApi(string $var): array
    {
        $reponse =  $this->client->request(
            'GET',
            'https://coronavirusapi-france.now.sh/' . $var
        );
        return $reponse->toArray();
    }
}
