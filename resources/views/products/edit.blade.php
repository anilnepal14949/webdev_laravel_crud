@extends('layouts.main')

@section('pageContent')
	<div class="container mt-3">
		<div class="row col-12 d-flex justify-content-between align-items-center">
			<div class="col-10">
				<h2> Edit <u>{{$product->product_name}}</u> Product </h2>
			</div>
			<div class="col-2 d-flex justify-content-end pe-0">
				<a class="btn btn-success" href="{{ route('products.index') }}"> Products List </a> 
			</div>
		</div>

		<form class="form mt-5" method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
			@csrf
			@method('put')
			<div class="row">
				<div class="col-6">
					<div class="form-group mb-3">
						<label for="product_name" class="mb-2"><strong> Product Name </strong></label>
						<input type="text" name="product_name" class="form-control" placeholder="Enter Product Name..." value="{{$product->product_name}}">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group mb-3">
						<label for="product_code" class="mb-2"><strong> Product Code </strong></label>
						<input type="text" name="product_code" class="form-control" placeholder="Enter Product Code..." value="{{$product->product_code}}">
					</div>
				</div>
				<div class="col-12">
					<div class="form-group mb-3">
						<label for="product_details" class="mb-2"><strong> Product Details </strong></label>
						<textarea name="product_details" class="form-control" placeholder="Enter Product Details...">{{$product->product_details}}</textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group mb-3">
						<label for="product_image" class="mb-2"><strong> Product Image </strong></label>
						<input type="file" name="product_image" class="form-control">
					</div>
				</div>
				<div class="col-12">
					<div class="form-group mb-3">
						<label for="" class="mb-2"><strong> Uploaded Image </strong></label>
						<img src="{{url($product->product_image)}}" width="150">
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success"> Update Product </button>
		</form>
	</div>
@endsection