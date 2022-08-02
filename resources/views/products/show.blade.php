@extends('layouts.app')
@section('content')

    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    
<style type="text/css">
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: red !important;
      background-color: #0d6efd;
       padding: 0.2rem;
    }
  </style>
<form  action="{{route('product.edit', $product->id)}}" method="post" class="container" enctype="multipart/form-data">
<h1>  PRODUCT DETAILS</h1>
@csrf
  <div class="form-group">
    <label for="">Product Name</label>
    <input type="text" class="form-control" value="{{$product->product_name}}" required name="product_name" id="" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="">Product Desc</label>
    <textarea class="form-control" id="" required name="product_desc" rows="7">{{$product->product_name}}</textarea>  </div>
  
    <div class=" form-group ">
    <label for="">Product Tags : </label>
      
      <input    name="product_tags"
        value="{{$product->product_tags}}"
        
         class="form-control" autofocus>
      <small class="text text-danger">HIT ENTER OR COMMA BUTTON FOR THE NEW WORD(TAG) </small>
    </div>
 
  

  <div class="form-group">
    <label for="exampleSelect">Select Category To Assign</label>
    <select class="form-control" name="cat_id" id="exampleSelect" required>
    <option>choose Category to Assign</option>
       @foreach($categories as $category)
       <option value="{{$category->id}}" @if($product->cat_id == $category->id) selected @endif>{{$category->category_name}}</option>
       @endforeach
    </select>
</div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Product Image</label>
    <input type="file" class="form-control-file" name="product_img" id="exampleFormControlFile1" >
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>


  <script src="https://unpkg.com/@yaireo/tagify"></script>
  <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
  <script>
    // The DOM element you wish to replace with Tagify
var input = document.querySelector('input[name=product_tags]');

// initialize Tagify on the above input node reference
new Tagify(input)
  </script>


@endsection