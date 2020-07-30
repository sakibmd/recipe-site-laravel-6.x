<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        $recipes = Recipe::latest()->get();
        $members = User::latest()->where('role_id', '=', 2 )->get();
        return view('admin.dashboard', compact('categories', 'members', 'recipes'));
    }
}
