@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:16.66666%">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align:center">Inicio de Sesión</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <img src="{{asset('assets/images/logo2.png')}}" alt="sorzana" style="width: 400px; height: 145px; margin-left:25%">
                        </div>
                        <div class="form-group{{ $errors != null ? $errors->has('username') ? ' has-error' : '' : ''}}">
                            <label class="col-md-4 control-label">Usuario</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors!= null ? $errors->has('username') : '')
                                    <span class="help-block">
                                        <strong>{{ $errors!= null ? $errors->first('username') : ''}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors!= null ? $errors->has('password') ? ' has-error' : '' : '' }}">
                            <label class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors!= null ? $errors->has('password') : '')
                                    <span class="help-block">
                                        <strong>{{ $errors!= null ? $errors->first('password') : '' }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      {{--  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" class="chek"> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>--}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Entrar
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Olvidó su contraseña?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
