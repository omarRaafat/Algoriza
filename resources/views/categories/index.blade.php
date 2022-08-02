
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css
"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"/>
<div class=" container">
  <table id="categories" class="table table-striped table-bordered nowrap"  style="width:100%">
  <caption>List of categories</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Is Active</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <a href="{{url('/product/create')}}" type="button" class="btn btn-primary">Create New Product</a>

  <a href="{{url('category/create/')}}" class="btn  btn-primary float-right">Add New Category </a>	
<br><br>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->category_name}}</td>
      <td>@if($category->is_active == 1)Active @else InActive @endif</td>
      <td>				<a href="{{url('category/edit/'.$category->id)}}" class="btn  btn-info">Edit </a>	
      <a href="{{url('category/delete/'.$category->id)}}" class="btn  btn-danger">Delete </a>	

    </td>
    </tr>

    @endforeach
   
  </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js
"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js
"></script>


<script>
   $(document).ready(function() {
    var table = $('#categories').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>
@endsection