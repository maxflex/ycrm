<?php

namespace App\Service;

use GuzzleHttp\Client;
use DB;

class Api {

    const COMPANIES = 'charterCompanies';
    const LOCATIONS = 'locations';
    const YACHT_MODELS = 'yachtModels';
    const YACHTS = 'yachts/'; // {charterCompanyId}

    public static function call($method, $data = [])
    {
        $data = array_merge([
            'username' => config('api.username'),
            'password' => config('api.password'),
        ], $data);

        $client = new Client(['base_uri' => config('api.base_url')]);

        $response = $client->post($method, [
            'json' => $data
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

}