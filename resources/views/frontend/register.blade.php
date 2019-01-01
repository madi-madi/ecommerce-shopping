@extends('frontend.layouts.login_register')
@section('content')
             <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-block p-4">
                        <h1>Register</h1>
                        <p class="text-muted">Create your account</p>
                           <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                            <input 
                            type="text"
                            id="name"
                            name="name"
                            value="{{old('name')}}" 
                            class="form-control"
                            required
                            autofocus 
                            placeholder="Name">
                        </div>
                            @if($errors->has('name'))
                            <figure class="invalid-feadback" role="alert">
                            <strong>
                            {{$errors->first('name')}}
                            </strong>
                            </figure>
                            @endif

                        <div class="input-group mb-3">
                            <span class="input-group-addon">@</span>
                            <input type="email"
                            id="email"
                            name="email" 
                            value="{{old('email')}}" 
                            class="form-control" 
                            required
                            placeholder="Email">
                        </div>
                            @if($errors->has('email'))
                            <figure class="invalid-feadback" role="alert">
                            <strong>
                            {{$errors->first('email')}}
                            </strong>
                            </figure>
                            @endif
                        <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input type="password"
                             class="form-control"
                             id="password"
                             name="password" 
                             required
                             placeholder="Password">
                        </div>
                            @if($errors->has('password'))
                            <figure class="invalid-feadback" role="alert">
                            <strong>
                            {{$errors->first('password')}}
                            </strong>
                            </figure>
                            @endif
                        <div class="input-group mb-4">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input type="password"
                            id="password-confirm"
                            name="password_confirmation" 
                            class="form-control" 
                            placeholder="Repeat password">
                        </div>
                        <button type="submit" class="btn btn-block btn-success">Create Account</button>
                    </div>
                </form>
                    <div class="card-footer p-4">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-block btn-facebook" type="button">
                                    <span>facebook</span>
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-twitter" type="button">
                                    <span>twitter</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection