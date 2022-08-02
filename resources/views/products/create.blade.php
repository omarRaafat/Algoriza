@extends('layouts.app')
@section('content')
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    
<style type="text/css">
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: white !important;
      background-color: #0d6efd;
      padding: 0.2rem;
      
    }

    .bootstrap-tagsinput .tag{
        color:red
    }
  </style>
  @if($categories->count()> 0)
<form  action="{{route('product.store')}}" method="post" class="container" enctype="multipart/form-data">
<h1>CREATE NEW PRODUCT</h1>
@csrf
  <div class="form-group">
    <label for="">Product Name</label>
    <input type="text" class="form-control" required name="product_name" id="" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="">Product Desc</label>
    <textarea class="form-control" id="" required name="product_desc" rows="7"></textarea>  </div>
  
    <div class=" form-group ">
    <label for="">Product Tags : </label>
     
      
      <input    name="product_tags"
         class="" autofocus>

        <span class="text text-danger">HIT ENTER OR COMMA BUTTON FOR THE NEW WORD(TAG) </span>
    </div>
 
  

  <div class="form-group">
    <label for="exampleSelect">Select Category To Assign</label>
    <select class="form-control" name="cat_id" id="exampleSelect" required>
    <option>choose Category to Assign</option>
       @foreach($categories as $category)
       <option value="{{$category->id}}">{{$category->category_name}}</option>
       @endforeach
    </select>
</div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Product Image</label>
    <input type="file" class="form-control-file" name="product_img" id="exampleFormControlFile1" required>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>

@else

<div class="container">
<h3 class=" text-danger">Unfortunately You Can't Add New Product , No Categories Active To Assign Yet</h3>
<h2>Let's Add The First Category ☺   <a href="{{url('category/create/')}}" class="btn  btn-primary ">Add New Category </a>	
 </h2>
</div>
@endif

  <script src="https://unpkg.com/@yaireo/tagify"></script>
  <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
  <script>
    // The DOM element you wish to replace with Tagify
var input = document.querySelector('input[name=product_tags]');

// initialize Tagify on the above input node reference
new Tagify(input)
  </script>


@endsection