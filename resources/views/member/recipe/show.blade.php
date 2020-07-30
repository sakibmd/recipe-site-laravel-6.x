@extends('layouts.backend.app')

@section('title', 'single post')

@push('css')
<style>
    
 </style> 
@endpush

@section('content')

    <a href="{{ route('member.recipe.index') }}" class="btn btn-danger">Back</a>
    <a href="{{ route('member.recipe.edit', $recipe->id) }}" class="btn btn-info">Edit</a>

    <div class="container mt-4" >
        <div class="row">
            <h6> <strong>Recipe Name: {{ $recipe->title }}</strong></h6>
        </div>
        <div class="row">
            <img style="height: 400px;width:640px;border:2px solid rgb(81, 192, 159);border-radius: 20px;" src="{{ asset('storage/recipe/'.$recipe->image) }}" 
            alt="image" class="img-responsive thumbnail">
        </div>
        <div class="row" style="margin-top: 25px;">
            <h6> <strong> Cooking Process: </strong></h6> 
        </div>
        <div class="row" style="margin-top: 5px;text-align: justify; width:90%">
            <p>{{ $recipe->body }}</p>
        </div>
    </div>

@endsection