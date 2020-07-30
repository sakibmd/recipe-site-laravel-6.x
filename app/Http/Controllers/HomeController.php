<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $recipies = Recipe::latest()->take(6)->get();
        return view('welcome', compact('recipies'));
    }

    public function details($slug){
        $recipe = Recipe::where('slug', '=', $slug)->first();
        return view('singlepost', compact('recipe'));
    }

    public function allRecipe(){
        $recipes = Recipe::latest()->paginate(6);
        return view('recipes', compact('recipes'));
    }
}
