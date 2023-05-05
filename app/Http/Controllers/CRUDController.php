<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CRUDController extends Controller
{
    public function Read() {
      return view('recipes', ['recipes' => Recipe::all()]);
    }

    public function Update($name) {
      $name = str_replace('-', ' ', $name);
      return view('recipe', ['recipe' => Recipe::firstWhere('name', $name),
                            'ingredients' => Ingredient::all()]);
    }

    public function UpdatePost(Request $request) {
      $validation = $request->validate([
        'img' => 'required',
        'name' => 'required',
        'description' => 'required',
        'instructions' => 'required',
      ]);
      $id = $request->post('id');
      $img = $validation['img'];
      $name = $validation['name'];
      $description = $validation['description'];
      $instructions = $validation['instructions'];
      $value_quantities = $request->post('quantity');
      $id_ingredients = $request->post('quantity_ingredient_id');

      $recipe = Recipe::firstWhere('id', $id);
      $recipe->name = $name;
      $recipe->description = $description;
      $recipe->instructions = $instructions;
      $images = Storage::disk('local')->files('public/images');
      $bool = null;
      for($i = 0; $i < count($images); $i++) {
        error_log($images[$i]);
        if(md5_file(str_replace('publicpublic', '/public/storage', public_path().$images[$i])) === md5_file($img->getRealpath())){
            $bool = str_replace('public/images/', '', ''.$images[$i]);
        }
      }
      if ($bool != null) {
        $recipe->img = $bool;
      } else {
        $img_name = ((string) Str::uuid()).'.'.$img->getClientOriginalExtension();
        $img->storeAs('/public/images/', $img_name);
        $recipe->img = $img_name;
      }
      $recipe->save();


      $id_ingredients = array_values($id_ingredients);
      $value_quantities = array_values($value_quantities);
      Quantity::where('recipe_id', $id)->delete();
      for ($i = 0; $i < count($value_quantities); $i++) {
        $quantity = Quantity::create([
            'quantity' => $value_quantities[$i],
            'recipe_id' => $id,
            'ingredient_id' => $id_ingredients[$i]
        ]);
        $quantity->save();
        //array_push($quantities, );
      }
      return redirect('/recipes');
    }

    public function Create() {
      return view('recipe', ['recipe' => null, 'ingredients' => Ingredient::all()]);
    }

    public function CreatePost(Request $request) {
        $validation = $request->validate([
          'img' => 'required',
          'name' => 'required',
          'description' => 'required',
          'instructions' => 'required',
        ]);
        $img = $validation['img'];
        $name = $validation['name'];
        $description = $validation['description'];
        $instructions = $validation['instructions'];
        $images = Storage::disk('local')->files('public/images');
        $bool = null;
        for($i = 0; $i < count($images); $i++) {
          if(md5_file(str_replace('publicpublic', '/public/storage', public_path().$images[$i])) === md5_file($img->getRealpath())){
            $bool = str_replace('public/images/', '', ''.$images[$i]);
          }
        }
        if ($bool != null) {
          $img_name = $bool;
        } else {
          $img_name = ((string) Str::uuid()).'.'.$img->getClientOriginalExtension();
          $img->storeAs('/public/images/', $img_name);
        }
        $recipe = Recipe::create([
          'img' => $img_name,
          'name' => $name,
          'description' => $description,
          'instructions' => $instructions
        ]);
        $value_quantities = $request->post('quantity');
        $id_ingredients = $request->post('quantity_ingredient_id');
        $id_ingredients = array_values($id_ingredients);
        $value_quantities = array_values($value_quantities);
        for ($i = 0; $i < count($value_quantities); $i++) {
          $quantity = Quantity::create([
            'quantity' => $value_quantities[$i],
            'recipe_id' => $recipe->id,
            'ingredient_id' => $id_ingredients[$i]
          ]);
          $quantity->save();
        }
        return redirect('/recipes');
    }

    public function Delete($name) {
      $name = str_replace('-', ' ', $name);
      $recipe = Recipe::firstWhere('name', $name);
      Quantity::where('recipe_id', $recipe->id)->delete();
      $recipe->delete();
      return redirect('/recipes');
    }
}
