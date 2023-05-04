@extends('layouts.layout')

@section('body')
<div class="recipe-modal modal fade" id="recipeModal1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content w-50 align-items-center">
          <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">{{ $recipes[$i]->name }}</h2>
                          <p class="item-intro text-muted">{{ $recipes[$i]->description }}</p>
                          @auth
                          <div class="mb-5">
                            <a class="btn btn-primary" href="/recipes/edit/{{ str_replace(' ', '-', $recipes[$i]->name) }}">Edit</a>
                            <a class="btn btn-danger" href="/recipes/delete/{{ str_replace(' ', '-', $recipes[$i]->name) }}">Delete</a>
                          </div>
                          @endauth
                          <img class="img-fluid d-block mx-auto" src="{{ url('/storage/images/'.$recipes[$i]->img) }}" alt="..." />
                          <p>{{$recipes[$i]->instructions}}</p>
                          <p class="item-intro text-muted h-4">Ingredients</p>
                          <ul class="list-inline">
                              @foreach($recipes[$i]->ingredients as $ingredient)
                              <li>
                                  <strong>{{$ingredient->ingredient->name}}</strong> - 
                                  {{ $ingredient->quantity.' '.$ingredient->ingredient->measure }} ({{ $ingredient->ingredient->price }}$);
                              </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
