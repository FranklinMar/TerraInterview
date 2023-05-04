@extends('layouts.layout')

@section('body')
<!-- Masthead-->
<header class="masthead h-auto" style="--url: url({{ asset('/img/sign-in-bg.jpg') }})">
  <div class="container bg-dark w-25 p-4 rounded">
    <div class="masthead-subheading">Sign in</div>
    <form method="POST" action="" class="text-white card border-0 bg-transparent align-items-center">
      <div class="form-floating bg-dark mb-2 w-75">
        @csrf
        <input type="email" id="email" class="bg-dark form-control form-control-sm" placeholder="Email Address">
        <label for="email" class="form-label">Email Address</label>
      </div>
      <div class="form-floating bg-dark mb-2 w-75">
        @csrf
        <input type="password" id="password" class="bg-dark form-control form-control-sm" placeholder="Password">
        <label for="password" class="form-label">Password</label>
      </div>
      <button type="submit" class="w-75 mb-4 btn btn-warning text-white btn-xl text-uppercase" href="#recipe">Teach me</button>
    </form>     
  </div>
</header>
@endsection