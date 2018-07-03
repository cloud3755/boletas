@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:#2ECCFA;">
                <div class="card-header" style="background-color:#ffff;">
                  <center>
                  <img src="logoinicio.jpg"style="width:40%;height:40%;">
                </center>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right" style="color:#0101DF;">
                               <a href="#" class="btn btn-primary btn-lg">
                                  <span class="glyphicon glyphicon-user"></span> Usuario
                                </a>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus style="font-size:150%;">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"  style="color:#0101DF;">        <a href="#" class="btn btn-primary btn-lg">
                              <span class="glyphicon glyphicon-lock"></span> Contraseña
                            </a></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required style="font-size:150%;">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                  <center>
                                    <label style="font-size:200%;">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Mantener sesion') }}
                                    </label>
                                  </center>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                              <center>
                                <button type="submit" class="btn btn-primary" style="font-size:200%;">
                                    {{ __('Ingresar') }}
                                </button>
                              </center>
                            </div>
                            <div class="col-md-8 offset-md-2">
                              <center>
                              <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size:150%;">
                                  {{ __('Olvidaste tu contraseña?') }}
                              </a>
                            </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
