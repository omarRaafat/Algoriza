@extends('layouts.app')
@section('content')

<form  action="{{route('category.edit' , $category->id)}}" method="post" class="container" enctype="multipart/form-data">
<h1>EDIT CATEGORY DETAILS</h1>
@csrf
  <div class="form-group">
    <label for="">Category Name</label>
    <input type="text" class="form-control" value="{{$category->category_name}}" required name="category_name" id="" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  
 
  

  <div class="form-group">
    <label for="exampleSelect">Active / InActive</label>
    <select class="form-control" name="is_active" id="exampleSelect" required>
    <option>choose Category Activity</option>
      
       <option value="1" @if($category->is_active == 1) selected @endif>Active</option>
       <option value="0" @if($category->is_active == 0) selected @endif>InActive</option>
     
    </select>
</div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>


<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script>
    $(function () {
      $('input')
        .on('change', function (event) {
          var $element = $(event.target);
          var $container = $element.closest('.example');

          if (!$element.data('tagsinput')) return;

          var val = $element.val();
          if (val === null) val = 'null';
          var items = $element.tagsinput('items');

          $('code', $('pre.val', $container)).html(
            $.isArray(val)
              ? JSON.stringify(val)
              : '"' + val.replace('"', '\\"') + '"'
          );
          $('code', $('pre.items', $container)).html(
            JSON.stringify($element.tagsinput('items'))
          );
        })
        .trigger('change');
    });
  </script>


@endsection