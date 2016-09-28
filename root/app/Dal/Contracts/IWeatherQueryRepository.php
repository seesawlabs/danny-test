<?php

namespace App\Dal\Contracts;

interface IWeatherQueryRepository extends IRepository
{
    /**
     * @param $userId
     * @return mixed
     */
    public function getQueriesByUser($userId);

    /**
     * @param $userId
     * @return int
     */
    public function countQueriesByUser($userId);
}