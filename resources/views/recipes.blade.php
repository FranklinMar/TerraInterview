@extends('layouts.layout')

@section('body')
<!-- Recipe Grid-->
<section class="page-section bg-dark" id="recipe">
    <div class="container mt-5">
        <div class="text-center">
            <h2 class="section-heading text-uppercase text-white">Recipies</h2>
            <h3 class="section-subheading text-muted">Look at different recipies.</h3>
        </div>
        @auth
            <a class="w-100 btn btn-success mb-5" href="{{ route('CreateRecipe') }}">Create New Recipe</a>
        @endauth
        <div class="row">
          @for ($i = 0; $i < $recipes->count(); $i++)
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="recipe-item">
                <a class="recipe-link" data-bs-toggle="modal" href="#recipeModal{{ $i + 1 }}">
                    <div class="recipe-hover">
                        <div class="recipe-hover-content"><h4>More</h4></div>
                    </div>
                    <img class="img-fluid" src="{{ url('/storage/images/'.$recipes[$i]->img) }}" alt="..." />
                </a>
                <div class="recipe-caption">
                    <div class="recipe-caption-heading">{{$recipes[$i]->name}}</div>
                    <div class="recipe-caption-subheading text-muted">{{explode('. ' ,$recipes[$i]->description)[0]}}</div>
                </div>
            </div>
          </div>
          @endfor
        </div>
    </div>
</section>
<!-- recipe Modals-->
<!-- recipe item 1 modal popup-->
@for ($i = 0; $i < $recipes->count(); $i++)
<div class="recipe-modal modal fade" id="recipeModal{{ $i + 1 }}" tabindex="-1" role="dialog" aria-hidden="true">
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
@endfor
@endsection
