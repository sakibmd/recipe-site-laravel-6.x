<?php

namespace App\Http\Controllers\Member;

use App\Category;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        $recipes = Recipe::latest()->where('user_id', '=', Auth::id())->get();
        $members = User::latest()->where('role_id', '=', 2 )->get();
        return view('member.dashboard', compact('categories', 'recipes', 'members'));
    }
}
