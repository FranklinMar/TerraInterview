@extends('layouts.layout')

@section('body')
<!-- Masthead-->
<header class="masthead h-auto" style="--url: url({{ asset('/img/sign-in-bg.jpg') }})">
  <div class="container bg-dark w-25 p-4 rounded">
    <div class="masthead-subheading">Sign up</div>
    <form method="POST" action="" class="text-white card border-0 bg-transparent align-items-center">
      <div class="form-floating bg-dark mb-2 w-75">
        @csrf
        <input type="text" name="name" id="name" class="bg-dark text-white form-control form-control-sm" placeholder="Name" required>
        <label for="name" class="form-label bg-transparent">Name</label>
      </div>
      <div class="form-floating bg-dark mb-2 w-75">
        @csrf
        <input type="email" name="email" id="email" class="bg-dark text-white form-control form-control-sm" placeholder="Email address" required>
        <label for="email" class="form-label bg-transparent">Email address</label>
      </div>
      <div class="form-floating bg-dark mb-2 w-75">
        @csrf
        <input type="password" name="password" id="password" class="bg-dark text-white form-control form-control-sm" placeholder="Password" required>
        <label for="password" class="form-label bg-transparent">Password</label>
      </div>
      <div class="form-floating bg-dark w-75">
        @csrf
        <input type="password" name="password confirmation" id="confirmpassword" class="bg-dark text-white form-control form-control-sm" placeholder="Confirm Password" required>
        <label for="confirmpassword" class="form-label bg-transparent">Confirm Password</label>
      </div>
      <div class="text-success mb-1">&NonBreakingSpace;
      </div>
      <a href="{{ route('Login') }}" class="link-light mb-1">Already signed up?</a>
      <button id="submit" type="submit" class="w-75 mb-4 btn btn-warning text-white btn-xl text-uppercase" href="#recipe" disabled>Sign Up</button>
    </form>     
  </div>
</header>
<script src="{{ asset('/js/confirmpwd.js') }}"></script>
@endsection