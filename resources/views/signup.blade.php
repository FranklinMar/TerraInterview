@extends('layouts.layout')

@section('body')
<!-- Masthead-->
<header class="masthead h-auto" style="--url: url({{ asset('/img/sign-in-bg.jpg') }})">
  <div class="container bg-dark w-25 p-4 rounded">
    <div class="masthead-subheading">Sign up</div>
    <form method="POST" action="" class="text-white card border-0 bg-transparent align-items-center">
      <div class="form-floating bg-dark mb-2 w-75">
        @csrf
        <input type="text" id="login" class="bg-dark text-white form-control form-control-sm" placeholder="Name" required>
        <label for="login" class="form-label bg-transparent">Name</label>
      </div>
      <div class="form-floating bg-dark mb-2 w-75">
        @csrf
        <input type="email" id="email" class="bg-dark text-white form-control form-control-sm" placeholder="Email address" required>
        <label for="email" class="form-label bg-transparent">Email address</label>
      </div>
      <div class="form-floating bg-dark mb-2 w-75">
        @csrf
        <input type="password" id="password" class="bg-dark text-white form-control form-control-sm" placeholder="Password" required>
        <label for="password" class="form-label bg-transparent">Password</label>
      </div>
      <div class="form-floating bg-dark mb-1 w-75">
        @csrf
        <input type="password" id="confirmpassword" class="bg-dark text-white form-control form-control-sm" placeholder="Confirm Password" required>
        <label for="confirmpassword" class="form-label bg-transparent">Confirm Password</label>
      </div>
      <a href="/login" class="link-light mb-1">Already signed up?</a>
      <button type="submit" class="w-75 mb-4 btn btn-warning text-white btn-xl text-uppercase" href="#recipe">Sign Up</button>
    </form>     
  </div>
</header>
<script src="{{ asset('/js/confirmpwd.js') }}"></script>
@endsection