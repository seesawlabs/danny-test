@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <div class="panel panel-warning">
                    <div class="panel-heading">The temperature at {{ $query->city }} ( {{ $query->zip_code  }} )</div>

                    <div class="panel-body">
                        <div class="query-temp">
                            <div>
                                Max: {{ $query->max_temp  }}
                            </div>
                            <div>
                                Min: {{ $query->min_temp  }}
                            </div>
                        </div>


                        <div class="pull-right">
                            <span class="label label-default">* All units in Fahrenheit</span>
                        </div>
                    </div>
                </div>

                @if($totalQueries > 1)
                    <div class="alert alert-info" role="alert">
                        <strong>Did a wear a sweater before ?</strong>
                        <a href="{{ url('/history')  }}">Find out here. Check your previous searches</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

