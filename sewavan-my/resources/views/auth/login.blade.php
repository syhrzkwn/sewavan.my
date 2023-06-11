@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5 my-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="h3 mb-3 fw-bold">Log In</h1>
                
                    <div class="form-floating mb-2">
                        <input id="email" type="email" class="form-control bg-light" id="floatingInput" placeholder="name@example.com" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="floatingInput">Email Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control bg-light" id="floatingPassword" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger pb-0 mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif    
                
                    <div class="checkbox mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
                </form>
                <p class="mt-4 mb-0">Don't have an account to book your preferred van? <a href="{{ route('register') }}">Register</a> now!</p>
            </div>
        </div>
    </div>
</div>
@endsection
