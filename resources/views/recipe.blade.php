@extends('layouts.layout')

@section('body')
<form method="POST" enctype="multipart/form-data" action="" class="form-floating bg-dark pt-5 p-5">
  @csrf
  <input type="hidden" name="id" value="{{ $recipe?->id }}">
  <div class="input-group" style="margin-top: 80px">
    <figure class="figure w-25">
      <img id="img" class="img-fluid rounded figure-img" src="{{ $recipe ? url('/storage/images/'.$recipe->img) : asset('img/default-image.jpg') }}" alt="..." />
    </figure>
    @csrf
    <input type="file" name="img" class="bg-dark text-white" accept=".jpg, .png, .gif" required>
  </div>
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
  <div id="ingredients">
  @if($recipe != null)
  @for($i = 0; $i < $recipe->ingredients->count(); $i++)
    @php($quantity = $recipe->ingredients[$i])
    <div class="input-group mb-2">
      @csrf
      <input type="number" name="quantity[{{ $i }}]" class="bg-dark text-white form-control form-control-sm" min="0" value="{{ $quantity->quantity }}" required>
      @csrf
      <select name="quantity_ingredient_id[{{ $i }}]" class="w-75 form-select" required>
        @foreach($ingredients as $ingredient)
          <option value='{{ $ingredient->id }}' {{ $ingredient->id == $quantity->ingredient->id ? 'selected' : ''}}>{{ $ingredient->name }}</option>
        @endforeach
      </select>
      <a class="btn btn-danger remove">Remove</a>
    </div>
  @endfor
  @endif
  </div>
  <div class="row mb-5 align-items-center">
    <a class="btn btn-success w-100" id="add">Add</a>
  </div>
  <button class="btn btn-primary w-100" type="submit">Submit</button>
</form>
<script src="{{ asset('/js/textareas.js') }}">
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
