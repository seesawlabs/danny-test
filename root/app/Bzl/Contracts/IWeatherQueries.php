<?php

namespace App\Bzl\Contracts;

interface IWeatherQueries
{
    /**
     * @param int $userId
     * @return mixed
     */
    public function countPreviousQueries($userId);

    /**
     * @param int $userId
     * @return mixed
     */
    public function getPreviousQueries($userId);

    /**
     * @param int $userId
     * @param string $zipCode
     * @return string
     */
    public function queryZipCode($userId, $zipCode);
}