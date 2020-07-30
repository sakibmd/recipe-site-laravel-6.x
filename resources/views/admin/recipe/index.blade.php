@extends('layouts.backend.app')

@section('title', 'list')

@push('css')
<style>
    
 </style> 
@endpush


@section('content')

<div class="container">
    <h2>Recipes</h2>

<br>
<p>
    <a class="btn btn-info" href="{{ route('admin.recipe.create') }}">Add New Recipe</a>
</p>
<hr>
@if (session()->has('success'))
<div class="alert alert-success m-3 text-center" id="success" role="alert">
  {{ session()->get('success') }}
   </div>
@endif 

<div class="table-responsive">
 <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Image</th>
        <th scope="col">Created At</th>
        <th scope="col">Show</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($recipes as $key => $recipe)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{  str_limit($recipe->title, 15)}}</td>
                <td>{{ str_limit($recipe->body, 20) }}</td>

                <td><img style="height: 80px; width: 138px" src="{{ asset('storage/recipe/'. $recipe->image) }}" alt="image"></td>



                <td>{{ $recipe->created_at->diffForHumans() }}</td>
            
                <td><a href="{{ route('admin.recipe.show', $recipe->id) }}" class="btn btn-success btn-block">Details</a></td>
                <td>
                    <a href="{{ route('admin.recipe.edit', $recipe->id) }}" class="btn btn-info btn-block">Edit</a>
                </td>
                <td>
                    <button class="btn btn-danger btn-block" type="button" onclick="deleteRecipe({{ $recipe->id }})">Delete</button>
                          
                    <form id="deleteRecipe-{{ $recipe->id }}" action="{{ route('admin.recipe.destroy', $recipe->id) }}" 
                    method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')   
                    </form>
                </td>

            </tr>
        @empty
            No Data Found
        @endforelse
    </tbody>
  </table>
  {{ $recipes->links() }}
</div>
  
</div>
@endsection


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
       <script type="text/javascript">
       function deleteRecipe(id){
           const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure to delete this?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('deleteRecipe-'+id).submit();
                } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
                ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                )
               }
            })
       } 
       </script>




