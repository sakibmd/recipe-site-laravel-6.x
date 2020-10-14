@extends('layouts.backend.app')

@section('title', 'single post')

@push('css')
<style>
    
 </style> 
@endpush

@section('content')

    <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm">Back</a>
    <a href="{{ route('member.recipe.edit', $recipe->id) }}" class="btn btn-info btn-sm">Edit</a>

    <div class="container mt-4" >

        <div class="row gallery">
            @foreach (json_decode($recipe->images) as $picture)
                       <div class="col-md-3">
                           <a href="{{ asset('images/'.$picture) }}">
                                       <img  src="{{ asset('images/'.$picture) }}" class="img-fluid m-2" style="height: 150px;width: 100%; ">
                           </a>
                       </div>
            @endforeach
       </div>


        <div class="row">
            <h6> <strong>Recipe Name: {{ $recipe->title }}</strong></h6>
        </div>
        <div class="row">
            <h6><strong>Category: {{ $recipe->category->name }}</strong></h6>
        </div>
        
        <div class="row" style="margin-top: 25px;">
            <h6> <strong> Cooking Process: </strong></h6> 
        </div>
        <div class="row" style="margin-top: 5px;text-align: justify; width:90%">
            <p>{{ $recipe->body }}</p>
        </div>
    </div>

@endsection



@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
<script>
   window.addEventListener('load', function() {
        baguetteBox.run('.gallery', {
            animation: 'fadeIn',
            noScrollbars: true
        });
   });
</script>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
@endsection