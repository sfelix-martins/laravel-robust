@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Account Confirmation</div>

                <div class="panel-body">
                    @if ($errors->has('token'))
                        <span class="help-block">
                            <strong>{{ $errors->first('token') }}</strong>
                        </span>
                    @else
                        <div class="alert alert-success">
                            Account Confirmed With Success!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
