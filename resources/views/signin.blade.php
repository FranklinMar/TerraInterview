@extends('layouts.layout')

@section('body')
<!-- Masthead-->
<header class="masthead h-auto" style="--url: url({{ asset('/img/sign-in-bg.jpg') }})">
  <div class="container bg-dark w-25 p-4 rounded">
    <div class="masthead-subheading">Sign in</div>
    <form method="POST" action="" class="text-white card border-0 bg-transparent align-items-center">
      <div class="form-floating bg-dark mb-2 w-75">
        @csrf
        <input type="text" name="login" id="login" class="bg-dark text-white form-control form-control-sm" placeholder="Email or Name" required>
        <label for="login" class="form-label bg-transparent">Email or Name</label>
      </div>
      <div class="form-floating bg-dark mb-1 w-75">
        @csrf
        <input type="password" name="password" id="password" class="bg-dark text-white form-control form-control-sm" placeholder="Password" required>
        <label for="password" class="form-label bg-transparent">Password</label>
      </div>
      <a href="{{ route('Register') }}" class="link-light mb-1">Don't have an account?</a>
      <button type="submit" class="w-75 mb-4 btn btn-warning text-white btn-xl text-uppercase" href="#recipe">Sign In</button>
    </form>     
  </div>
</header>
@endsection