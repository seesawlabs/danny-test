<?php

namespace App\Http\Controllers;

use App\Bzl\Contracts\IWeatherQueries;

use App\Http\Requests\QueryWeatherRequest;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * @var IWeatherQueries
     */
    private $weatherQueries;

    /**
     * IndexController constructor.
     * @param IWeatherQueries $weatherQueries
     */
    public function __construct(IWeatherQueries $weatherQueries)
    {
        $this->middleware('auth');
        $this->weatherQueries = $weatherQueries;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $total = $this->weatherQueries->countPreviousQueries(Auth::user()->id);

        return view('index', ['totalQueries'=>$total]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function history(){
        $queries = $this->weatherQueries->getPreviousQueries(Auth::user()->id);
        return view('history', ['queries' =>  $queries]);
    }

    /**
     * @param QueryWeatherRequest $queryWeatherRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function queryWeather(QueryWeatherRequest $queryWeatherRequest){
        $query = $this->weatherQueries->queryZipCode(Auth::user()->id, $queryWeatherRequest['zipCode']);
        $total = $this->weatherQueries->countPreviousQueries(Auth::user()->id);
        return view('query', ['totalQueries'=>$total, 'query'=>$query]);
    }
}
