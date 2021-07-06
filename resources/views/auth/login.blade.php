{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<article class=" login-main-container d-flex justify-content-md-center align-items-center">
            <div class="card">
                <div class = "top-panel"><h1>Войти</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail адрес') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row form-check">
                            <div class="col-md-6 offset-md-4">
                                <div class="">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить меня') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group button-div">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Войти') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Забыли свой пароль?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
</article>

<style scoped>
    .login-main-container{
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 400px;
        height: 400px;
        background: #e6e5f3;
        border-radius: 10px;
        /*border: solid 1px grey;*/
    }


    .row{
        display: flex;
        flex-basis: 50%;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        font-family: Montserrat;
        font-size: 14px;
        margin-top: 10px;
    }

    h1{

        font-size: 30px;
    }

    .card-body{
        width: 80%;
        padding: 20px 50px;
    }

    .top-panel{

    }

    .form-check{
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .button-div button{
        padding: 5px 50px;
    }

    .button-div a{
        display: inline-block;
        margin-top: 10px;
    }

    .button-div{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }

</style>

{{--@endsection--}}
