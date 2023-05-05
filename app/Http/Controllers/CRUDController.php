<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Quantity;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    public function Read() {
      return view('recipes', ['recipes' => Recipe::all()]);
    }

    public function Update($name) {
      $name = str_replace('-', ' ', $name);
      return view('recipe', ['recipe' => Recipe::all()->where('name', $name)->first()]);
    }

    public function UpdatePost(Request $request) {
      return redirect('/recipes');
    }
    
    public function Create(Request $request) {
      Ingredient::create();
      Quantity::create();
      return redirect('/recipes');
    }
    
    public function Delete($name) {
      $name = str_replace('-', ' ', $name);
      Recipe::destroy(Recipe::all()->where('name', $name)->first());
      return redirect('/recipes');
    }
}
