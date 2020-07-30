@extends('layouts.backend.app')

@section('title', 'Dashboard')


<style>
    .icon{
        color: rgb(235, 227, 227) !important;
        font-size:55px !important;
        padding-bottom: 20px;
    }
    .col-md-3{
        background-color: rgb(95, 93, 182);
        height: 200px;
        padding: 20px;
        margin: 20px 40px; 
    }
    .number{
        color:azure;
    }
    .boxs{
        margin-top: 75px;
    }

    .col-md-3:hover{
        background: rgb(94, 114, 158)
    }

 </style> 



@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="name">Welcome to Admin Panel - <span style="padding: 6px;color:white;background:grey;"> {{ Auth::user()->name }}</span></h1>  

        </div>
    </div>
    <div class="row text-center boxs">
        <div class="col-md-3 ">
                <i class="icon material-icons" >apps</i>
                <h3 class="number">Categories</h3>
                <h3 class="number">{{ $categories->count() }}</h3>
        </div>
        <div class="col-md-3">
            <i class="icon material-icons" >outdoor_grill</i>
            <h3 class="number">Recipes</h3>
            <h3 class="number">{{ $recipes->count() }}</h3>
    </div>
    <div class="col-md-3">
        <i class="icon material-icons" >account_circle</i>
        <h3 class="number">Members</h3>
        <h3 class="number">{{ $members->count() }}</h3>
    </div>
    </div>
</div>
@endsection

