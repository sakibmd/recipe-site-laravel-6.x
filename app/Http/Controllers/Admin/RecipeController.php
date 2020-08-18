<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recipe;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::latest()->paginate(8);
        return view('admin.recipe.index',compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.recipe.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'categories' => 'required',
           ]);

           // Get Form Image
          $image = $request->file('image');
          $slug = str_slug($request->title);
          if (isset($image)) {
             // Make Unique Name for Image 
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           
          // Check Category Dir is exists
  
              if (!Storage::disk('public')->exists('recipe')) {
                 Storage::disk('public')->makeDirectory('recipe');
              }
  
  
              // Resize Image for category and upload
              $postImage = Image::make($image)->resize(1600,1000)->stream();
              Storage::disk('public')->put('recipe/'.$imageName,$postImage);
  
            }else{
                $imageName = "default.png";
            }
  

            $recipe = new Recipe();
            $recipe->title = $request->title;
            $recipe->slug = $slug;
            $recipe->body = $request->body;
            $recipe->image = $imageName;
            $recipe->user_id = Auth::id();
            $recipe->category_id = $request->categories;
            $recipe->save();
            return redirect(route('admin.recipe.index'))->with('success', 'Recipe Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('admin.recipe.show', compact('recipe')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        return view('admin.recipe.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
           ]);

           $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image)) {
             
        // Make Unique Name for Image 
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
  
        // Check Category Dir is exists
        if (!Storage::disk('public')->exists('recipe')) {
            Storage::disk('public')->makeDirectory('recipe');
        }
  
        // Delete old post image
        if(Storage::disk('public')->exists('recipe/'.$recipe->image)){
            Storage::disk('public')->delete('recipe/'.$recipe->image);
        }
  
        // Resize Image for category and upload
        $postImage = Image::make($image)->resize(1600,1066)->stream();
        Storage::disk('public')->put('recipe/'.$imageName,$postImage);
  
     }else{

        $ext = pathinfo(public_path().'recipe/'.$recipe->image, PATHINFO_EXTENSION);
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$ext;
              
        Storage::disk('public')->rename('recipe/'.$recipe->image, 'recipe/'.$imageName);
        $recipe->image = $imageName;
     }

     
     $recipe->title = $request->title;
     $recipe->slug = $slug;
     $recipe->body = $request->body;
     $recipe->image = $imageName;
     $recipe->save();
     return redirect(route('admin.recipe.index'))->with('success', 'Recipe Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        if (Storage::disk('public')->exists('recipe/'.$recipe->image)) {
            Storage::disk('public')->delete('recipe/'.$recipe->image);
         }
         $recipe->categories()->detach();
         $recipe->delete();
         return redirect(route('admin.recipe.index'))->with('success', 'Recipe Deleted Successfully');
    }
}
