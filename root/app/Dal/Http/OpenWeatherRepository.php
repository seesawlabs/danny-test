<?php

namespace App\Dal\Http;

use App\Dal\Contracts\IOpenWeatherRepository;
use App\Dal\Exceptions\RepositoryException;

class OpenWeatherRepository implements IOpenWeatherRepository
{

    /**
     * @param string $zipCode
     * @return string
     */
    private function buildApiUrl($zipCode){
        $apiUrl = str_replace('{zip}', $zipCode, env('OWAPI_URL', ''));
        return str_replace('{key}', env('OWAPI_KEY', ''), $apiUrl);
    }

    /**
     * @param $zipCode
     * @return string
     *
     * @throws RepositoryException
     */
    public function getWeatherByZipCode($zipCode)
    {
        $apiUrl = $this->buildApiUrl($zipCode);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $apiUrl
        ));

        $resp = curl_exec($curl);
        if(!$resp){
            throw new RepositoryException("Unable to query weather api: " . curl_error($curl) . " - Code: " . curl_errno($curl));
        }
        curl_close($curl);

        $json = json_decode($resp);
        if($json->cod && $json->cod == '404'){
            throw new RepositoryException("City not found");
        }

        return $resp;
    }
}
