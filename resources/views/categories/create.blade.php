@extends('layouts.app')
@section('content')

<form  action="{{route('category.store')}}" method="post" class="container" enctype="multipart/form-data">
<h1>CREATE NEW CATEGORY</h1>
@csrf
  <div class="form-group">
    <label for="">Category Name</label>
    <input type="text" class="form-control" required name="category_name" id="" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  
 
  

  <div class="form-group">
    <label for="exampleSelect">choose Activity status (if no selection , active by default)</label>
    <select class="form-control" name="is_active" id="exampleSelect" required>
    <option value="1">choose Category Activity</option>
      
       <option value="1">Active</option>
       <option value="0">InActive</option>
     
    </select>
</div>
  
  <button type="submit" class="btn btn-primary">Create</button>
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