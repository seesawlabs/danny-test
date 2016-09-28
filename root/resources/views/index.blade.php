@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @if($totalQueries > 0)
                    <div class="alert alert-info" role="alert">
                        <strong>Did a wear a sweater before ?</strong>
                        <a href="{{ url('/history')  }}">Find out here. Check your previous searches</a>
                    </div>
                @endif

                <div class="panel panel-warning">
                    <div class="panel-heading">What's the current temperature?</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/check-weather') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('zipCode') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Zip Code</label>

                                <div class="col-md-6">
                                    <input id="zipCode" type="text" class="form-control" name="zipCode"
                                           value="{{ old('zipCode') }}">

                                    @if ($errors->has('zipCode'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('zipCode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Go
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
