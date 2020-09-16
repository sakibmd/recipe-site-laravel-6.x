<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $recipies = Recipe::latest()->take(6)->get();
        $categories = Category::all();
        return view('welcome', compact('recipies', 'categories'));
    }

    public function details($slug){
        $recipe = Recipe::where('slug', '=', $slug)->first();
        return view('singlepost', compact('recipe'));
    }

    public function allRecipe(){
        $recipes = Recipe::latest()->paginate(6);
        return view('recipes', compact('recipes'));
    }

    public function categoryWisePost($id){
        $category = Category::find($id);
        $recipes = Recipe::where('category_id', '=' ,$id)->paginate(6);
        return view('categoryWiseShow', compact('category', 'recipes'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $recipes = Recipe::where('title','LIKE',"%$query%")->paginate(6);
        return view('search', compact('recipes', 'query'));
    }
}
