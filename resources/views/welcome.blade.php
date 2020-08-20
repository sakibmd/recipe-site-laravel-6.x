@extends('layouts.frontend.app')

@section('title','Home Page')
    

@push('css')
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
@endpush

<style>
  

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

       <section id="cover"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <h3>Delicious  Homemade Pizza</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati laboriosam voluptas
                             fuga dolorem aperiam voluptate corrupti, iste optio, nihil.</p>
                    </div>
                </div>
            </div>
        </div>
       </section>


       <section id="recipe">
           <div class="container text-center">
            <h1 class="upper-title text-center">Amazing Recipes</h1>
               <div class="row">
                <div class="col-md-9 col-sm-8 mb-3">
                @foreach ($recipies as $item)
                  <div class="col-lg-4 col-md-6 col-sm-12 mb-4  full-recipe">
                    <div class="card recipe">
                        <div class="card-body text-center">
                            <h4 class="card-title title text-center">{{ str_limit($item->title, 40) }}</h4>
                            <p class="card-text text-center pera">For Description</p>
                            <a href="{{ route('recipe.details', $item->slug) }}" class="button"  style="color: white;text-decoration: none; font-weight: bold;background: black;
                            padding:12px; ">Read More</a>
                        </div>
                        <img  src="{{ asset('storage/recipe/'. $item->image) }}" class="img-fluid" alt="Card image" style="padding: 0px 25px 25px 25px;">
                    </div>
                   
                  </div>
                  @endforeach
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="list-group">
                        <button type="button" class="list-group-item  list-group-item-style">
                          All Categories
                        </button>
                        @foreach ($categories as $category)
                        <button type="button" class="list-group-item list-group-item-success">
                            <a style="text-decoration: none" href="{{ route('categoryWiseShow.recipe.details', $category->id ) }}"><strong>{{ $category->name }} </strong>
                            <span class="badge badge-dark">{{ $category->recipes->count() }}</span></a>
                             </button>
                        @endforeach
                      </div>
                </div>
                  <a href="{{ route('recipe.allRecipe') }}" class="btn btn-default m-auto see-more">See More</a>
               </div>
           </div>
       </section>


  
                




@endsection

@push('js')



@endpush