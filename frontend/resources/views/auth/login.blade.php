@extends('layouts.app')

@section('title')
    | Login
@endsection
@section('content')

<style>
    @media only screen and (max-width : 400px){
        .login{
            display: none;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 login">
            <img src="{{ url('/img/login.png')}}">
        </div>
        <div class="col-md-6">
            <div class="card">

                <div class="card-body text-center">
                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12 text-center mx-auto">
                            <img class="img-responsive text-center" src="{{ url('img/logo.png')}}">
                        </div>
                    </div>
                    <h2 class="font-bold text-3xl text-center mt-10 mb-6">Hallo Selamat Datang</h2>
                    <p class="text-gray-400 text-center text-lg mb mb-6">Silahkan login akun anda disini</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-8 mx-auto">
                                <input id="email" type="email" required
                                placeholder="E-mail"
                                autofocus class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-8 mx-auto">
                                <input id="password" type="password" placeholder="Password"
                                required
                                autocomplete="current-password" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm @error('password') is-invalid @enderror" name="password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto flex justify-between ">
                                <div class="flex">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="px-2 sm:px-14 text-lg sm:mt-0" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 sm:flex text-center items-center sm:justify-between py-8 sm:mt-4 sm:py-10">
                            <div class="col-md-8 mx-auto flex justify-between ">
                                <button type="submit" class="sm:w-24 sm:h-10 inline-flex items-center py-2 px-4 bg-violet-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-violet-700 active:bg-viole-900 focus:outline-none focus:border-violet-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
