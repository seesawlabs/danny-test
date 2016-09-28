<?php

namespace App\Bzl;

use App\Bzl\Contracts\IWeatherQueries;
use App\Dal\Contracts\IOpenWeatherRepository;
use App\Dal\Contracts\IWeatherQueryRepository;

class WeatherQueries implements IWeatherQueries
{
    /**
     * @var IWeatherQueryRepository
     */
    private $repository;
    /**
     * @var IOpenWeatherRepository
     */
    private $openWeatherRepository;

    /**
     * WeatherQueries constructor.
     * @param IWeatherQueryRepository $repository
     * @param IOpenWeatherRepository $openWeatherRepository
     */
    public function __construct(IWeatherQueryRepository $repository, IOpenWeatherRepository $openWeatherRepository)
    {
        $this->repository = $repository;
        $this->openWeatherRepository = $openWeatherRepository;
    }

    /**
     * @param int $userId
     * @return int|mixed
     */
    public function countPreviousQueries($userId)
    {
        return $this->repository->countQueriesByUser($userId);
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function getPreviousQueries($userId)
    {
        return $this->repository->getQueriesByUser($userId);
    }

    /**
     * @param int $userId
     * @param string $zipCode
     * @return bool|mixed
     */
    public function queryZipCode($userId, $zipCode)
    {
        $weatherData = $this->openWeatherRepository->getWeatherByZipCode($zipCode);
        if($weatherData){
            $jsonData = json_decode($weatherData);
            return $this->repository->create([
                'user_id'  => $userId,
                'zip_code' => $zipCode,
                'min_temp' => $jsonData->main->temp_min,
                'max_temp' => $jsonData->main->temp_max,
                'city'     => $jsonData->name,
                'response' => $weatherData
            ]);
        }
        return false;
    }
}