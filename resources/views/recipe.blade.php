@extends('layouts.layout')

@section('body')
<form method="POST" enctype="multipart/form-data" action="" class="form-floating bg-dark pt-5 p-5">
  @csrf
  <input type="hidden" name="id" value="{{ $recipe?->id }}">
    <img id="img" class="img-fluid rounded img-thumbnail mt-5 mb-1" src="{{ $recipe ? url('/storage/images/'.$recipe->img) : asset('img/default-image.jpg') }}" alt="..." />
    @csrf
    <input type="file" name="img" class="bg-dark text-white mb-3 w-100" accept=".jpg, .png, .gif" required>
  <div class="form-floating mb-3">
    @csrf
    <input type="text" id="name" name="name" class="bg-dark text-white form-control form-control-sm" placeholder="Name" value="{{ $recipe?->name }}" required>
    <label for="name" class="form-label bg-transparent text-white">Name</label>
  </div>
  <div class="form-floating mb-3">
    @csrf
    <textarea id="description" type="text" class="bg-dark text-white form-control form-control-sm" name="description" placeholder="Description" required>{{ $recipe?->description }}</textarea>
    <label for="description" class="form-label bg-transparent text-white">Description</label>
  </div>
  <div class="form-floating mb-3">
    @csrf
    <textarea id="instructions" type="text" class="bg-dark text-white form-control form-control-sm" name="instructions" placeholder="Instructions" required>{{ $recipe?->instructions }}</textarea>
    <label for="instructions" class="form-label bg-transparent text-white">Instructions</label>
  </div>
  <p class="item-intro text-muted h3">Ingredients</p>
  <div id="ingredients">
  @if($recipe != null)
  @for($i = 0; $i < $recipe->ingredients->count(); $i++)
    @php($quantity = $recipe->ingredients[$i])
    <div class="input-group mb-2">
      @csrf
      <input type="number" name="quantity[{{ $i }}]" class="col-12 col-md-4 bg-dark text-white form-control form-control-sm" min="0" value="{{ $quantity->quantity }}" required>
      {{-- <span class="input-group-text col-12 col-md-3">{{ $quantity->ingredient->measure }}</span> --}}
      @csrf
      <select name="quantity_ingredient_id[{{ $i }}]" class="col-12 col-md-4 form-select" required>
        @foreach($ingredients as $ingredient)
          <option value='{{ $ingredient->id }}' {{ $ingredient->id == $quantity->ingredient->id ? 'selected' : ''}}>{{ $ingredient->name }}
            {{ $ingredient->measure != '' ? '('.$ingredient->measure.')' : '' }}</option>
        @endforeach
      </select>
      <a class="btn btn-danger remove col-12 col-md-4">Remove</a>
    </div>
  @endfor
  @endif
  </div>
  <div class="row mb-5 align-items-center">
    <a class="btn btn-success w-100" id="add">Add</a>
  </div>
  <button class="btn btn-primary w-100" type="submit">Submit</button>
</form>
<script src="{{ asset('/js/recipe.js') }}">
</script>
<script>
    let url = "{{ url('/storage/images/'.$recipe?->img) }}";
    let filename = "{{ $recipe?->img }}";
    if (url && filename) {
      loadURLToInputFiled(url, filename);
    }
  i = {{ $ingredients->count() }};
  ingredients = {!! json_encode($ingredients); !!};
</script>
@endsection
