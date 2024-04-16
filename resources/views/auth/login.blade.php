@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">{{ __('Login') }}</div>
<div class="card-body">
 <form method="POST" action="{{ route('login') }}">
      @csrf
        <div class="mb-3 row">
            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                <div class="col-md-6">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                </div>
        </div>
        <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <input type="submit" class="offset-md-5 btn btn-primary" value="Login">
            </div>
     @csrf
<div class="form-group row">
    <div class="col-md-6 offset-md-3">
        <a href="{{ route('login.google') }}" class="btn btn-danger btn-block">
            <i class="fab fa-google"></i> Login with Google
        </a>
        <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block">
            <i class="fab fa-facebook"></i> Login with Facebook
        </a>
        <a href="{{ route('login.github') }}" class="btn btn-dark btn-block">
            <i class="fab fa-github"></i> Login with Github
        </a>
    </div>
</div>

</form>
</div>
</div>
</div>
</div>
</div>
@endsection