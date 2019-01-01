@extends('frontend.layouts.login_register')
@section('content')
            <div class="col-md-8">

                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-block">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{old('email')}}" 
                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                required
                                autofocus 
                                placeholder="E-mail">

                            </div>
                            @if($errors->has('email'))
                            <figure class="invalid-feadback" role="alert">
                            <strong>
                            {{$errors->first('email')}}
                            </strong>
                            </figure>
                            @endif
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input 
                                type="password" 
                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                id="password"
                                name="password"
                                required 
                                placeholder="Password">
                            </div>
                            @if($errors->has('password'))
                            <figure class="invalid-feadback">
                            <strong>
                            {{$errors->first('password')}}        
                            </strong>
                            </figure>
                            @endif
                            <div class="input-group mb-4">
                                <div class="form-check">
                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-muted" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">
                                           {{ __('Login') }}
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-link px-0" href="{{route('password.request')}}">{{__('Forgot password?')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-block text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a class="btn btn-primary active mt-3" href="{{route('register')}}">{{{__('Register Now!')}}}</a>
                            </div>
                        </div>
                    </div>
                </div>
             </div>

@endsection