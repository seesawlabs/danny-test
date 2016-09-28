<?php

namespace App\Dal\Eloquent;

use App\Dal\Contracts\IWeatherQueryRepository;
use App\Dal\Models\WeatherQuery;

class WeatherQueryRepository extends RepositoryBase
                             implements IWeatherQueryRepository
{
    /**
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function getQueriesByUserBuilder($userId){
        return $this->builder->where('user_id', '=', $userId);
    }

    /**
     * @return string
     */
    function model()
    {
        return WeatherQuery::class;
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function getQueriesByUser($userId)
    {
        return $this->getQueriesByUserBuilder($userId)
                    ->orderBy('created_at', 'desc')
                    ->get();
    }

    /**
     * @param int $userId
     * @return int
     */
    public function countQueriesByUser($userId)
    {
        return $this->getQueriesByUserBuilder($userId)
                    ->count();
    }
}