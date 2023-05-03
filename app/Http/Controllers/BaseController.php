<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class BaseController extends Controller
{
  public static $NUMBER_OF_RECIPIES = 3;
    public function home() {
      $recipes = Recipe::all()->take($this::$NUMBER_OF_RECIPIES);
      $context = ['recipes' => $recipes];
      return view('home', $context);
    }
}
