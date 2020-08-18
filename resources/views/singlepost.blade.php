@extends('layouts.frontend.app')

@section('title','Single Post')
    

<style>
    img{
        border-radius: 20px;
    }

    .cont{
        padding: 40px 20px;
        margin-top: 95px;
    }
    h2, h4{
        font-family: 'Lalezar', cursive;
    }

    p{
        text-align: justify;
    }
</style>
    
@section('content')

                    @if (session()->has('successSubscriber'))
                        <div class="alert alert-success m-3" role="alert">
                            {{ session()->get('successSubscriber') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger m-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

      
        <div class="container cont">
            <div class="row">
                <h2>Recipe Name: {{ $recipe->title }}</h2>
            </div>
            <div class="row">
                <img src="{{ asset('storage/recipe/'. $recipe->image) }}" alt="image" height="400px" width="640px">
            </div>
            <div class="row">
                <h4 class="mt-4">Cooking Process</h4>
            </div>
            <div class="row">
                <p>{{ $recipe->body }}</p>
            </div>
            <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
        </div>
      
@endsection

@push('js')



@endpush