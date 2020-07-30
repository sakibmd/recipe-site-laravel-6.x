@extends('layouts.backend.app')

@section('title', 'add')

@push('css')
<style>
    
 </style> 
@endpush

@section('content')


<h2 style="text-align:center;font-weight: 700">Add New Recipe</h2>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6 card p-4">
                <form action="{{ route('member.recipe.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Recipe Title</label>
                        <input  name="title" placeholder="type here.." value="{{ old('title') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="body">Recipe Description</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="3">{{ old('body') }}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="file" name="image" value="{{ old('image') }}">
                    </div>
                    <div class="form-group">
                        <select name="categories" id="category" class="form-control">
                            <option class="text-center" value="" >Select a category</option>
                            @foreach ($categories as $category)
                                <option class="text-center" value="{{ $category->id }}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
            
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success">Create</button>
                    <a href="{{ route('member.recipe.index') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

@endsection