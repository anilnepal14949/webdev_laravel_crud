@extends('layouts.main')

@section('pageContent')
	<div class="container mt-3">
		<div class="row col-12 d-flex justify-content-between align-items-center">
			<div class="col-10">
				<h2> Create Product </h2>
			</div>
			<div class="col-2 d-flex justify-content-end pe-0">
				<a class="btn btn-success" href="{{ route('products.index') }}"> Products List </a> 
			</div>
		</div>

		<form class="form mt-5" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-6">
					<div class="form-group mb-3">
						<label for="product_name" class="mb-2"><strong> Product Name </strong></label>
						<input type="text" name="product_name" class="form-control" placeholder="Enter Product Name...">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group mb-3">
						<label for="product_code" class="mb-2"><strong> Product Code </strong></label>
						<input type="text" name="product_code" class="form-control" placeholder="Enter Product Code...">
					</div>
				</div>
				<div class="col-12">
					<div class="form-group mb-3">
						<label for="product_details" class="mb-2"><strong> Product Details </strong></label>
						<textarea name="product_details" class="form-control" placeholder="Enter Product Details..."></textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group mb-3">
						<label for="product_image" class="mb-2"><strong> Product Image </strong></label>
						<input type="file" name="product_image" class="form-control">
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success"> Add Product </button>
		</form>
	</div>
@endsection