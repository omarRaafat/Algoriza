@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
	<aside class="col-md-3">
		
<div class="card">
	<article class="filter-group">
		<header class="card-header">
			
				<h6 class="title">Search By Product Name </h6>
			
		</header>
		<div class="filter-content collapse show" id="collapse_1" style="">
			<div class="card-body">
				<form action="{{url('/product/filter2/category')}}" method="post" class="pb-3">
				@csrf
                <div class="input-group">
				  <input type="text" class="form-control" name="filter_key" placeholder="Search">
				  <div class="input-group-append">
				    <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
				  </div>
				</div>
				</form>
				
			

			</div> <!-- card-body.// -->
		</div>
	</article> <!-- filter-group  .// -->
	<article class="filter-group">
		<header class="card-header">
			
				
				 <h6 class="title">Filter By <a href="{{url('/categories')}}">Categories </a></h6> 
			
		</header>
		<div class="filter-content collapse show" id="collapse_2" style="">
			<div class="card-body">
            <ul class="list-menu">
			 @if($categories->count() > 0)
                @foreach($categories as $category)
                <li><a href="{{url('/product/filter/category/'.$category->id)}}">{{$category->category_name}}  </a>
            </li>   
                    @endforeach
                    @else
                     NO CATEGORIES ADDED YET
                    @endif
				</ul>
				
	</div> <!-- card-body.// -->
		</div>
	</article> <!-- filter-group .// -->
	
</div> <!-- card.// -->

	</aside>
	<main class="col-md-9">

<header class="border-bottom mb-4 pb-3">
		<div class="form-inline">
			<span class="mr-md-auto">@if($products->count() > 0){{$products->count()}} @else 0 @endif Products found </span>
            <select class="mr-2 form-control">
				<option>Latest items</option>
				<option>Trending</option>
				<option>Most Popular</option>
				<option>Cheapest</option>
			</select>
            <a href="{{url('/product/create')}}" type="button" class="btn btn-primary">Create New Product</a>
			
			
		</div>
</header><!-- sect-heading -->

<div class="row">
@if($products->count() > 0)
@foreach($products as $product)

	<div class="col-md-4">
		<figure class="card card-product-grid">
			<div class="img-wrap"> 
							<img src="{{url($product->product_img)}}" class="img-fluid">
				<a class="btn-overlay" href="{{url('product/show/'.$product->id)}}"><i class="fa fa-search-plus"></i> Quick view</a>
			</div> <!-- img-wrap.// -->
			<figcaption class="info-wrap">
				<div class="fix-height text-center">
					<span href="#" class="title">{{$product->product_name}}</span>
					
				</div>
				<a href="{{url('product/show/'.$product->id)}}" class="btn btn-block btn-primary">View </a>	
			</figcaption>
		</figure>
	</div> <!-- col.// -->
@endforeach
@else

<h3> NO PRODUCTS FOUND </h3>

@endif
	
</div> <!-- row end.// -->


<nav class="mt-4" aria-label="Page navigation sample">
 {{$products->links()}}
</nav>

	</main>
	</div>
</div>

@endsection