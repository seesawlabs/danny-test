@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Your previous searches</div>

                    <div class="panel-body">
                        <div class="pull-right">
                            <span class="label label-default">* All units in Fahrenheit</span>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <th>
                                Zip Code
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                Min Temperature
                            </th>
                            <th>
                                Max Temperature
                            </th>
                            </thead>
                            <tbody>
                            @foreach($queries as $query)
                                <tr>
                                    <td>
                                        {{ $query->zip_code }}
                                    </td>
                                    <td>
                                        {{ $query->city }}
                                    </td>
                                    <td>
                                        {{ $query->min_temp }}
                                    </td>
                                    <td>
                                        {{ $query->max_temp }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

