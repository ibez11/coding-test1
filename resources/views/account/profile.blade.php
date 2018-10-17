@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{route('profile')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">{{$phone}}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{$phone_value}}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">{{$gender}}</label>

                            <div class="col-md-6">
                                <input name="gender" value="1" {{$gender_value_m}} type="radio" />Laki-laki
                                <input name="gender" value="0" {{$gender_value_f}} type="radio" />Perempuan

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birthdate" class="col-md-4 control-label">{{$birthdate}}</label>
    
                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{$birthdate_value}}" required autofocus>

                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nationality" class="col-md-4 control-label">{{$nationality}}</label>

                            <div class="col-md-6">
                                <input id="nationality" type="text" class="form-control" name="nationality" value="{{$nationality_value}}" required autofocus>

                                @if ($errors->has('nationality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
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
