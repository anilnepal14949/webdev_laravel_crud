@extends('layouts.main')

@section('pageContent')
	<div class="container mt-3">
		<div class="row col-12 d-flex justify-content-between align-items-center">
			<div class="col-10">
				<h2> Edit <u>{{$category->category_name}}</u> Category </h2>
			</div>
			<div class="col-2 d-flex justify-content-end pe-0">
				<a class="btn btn-success" href="{{ route('categories.index') }}"> Categories List </a> 
			</div>
		</div>
		<form class="form mt-5" method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
			@csrf
			@method('put')
			<div class="row">
				<div class="col-6">
					<div class="form-group mb-3">
						<label for="category_name" class="mb-2"><strong> Category Name </strong></label>
						<input type="text" name="category_name" class="form-control" placeholder="Enter Category Name..." value="{{$category->category_name}}">
						@error('category_name')
							<p style="color: red;"> {{$message}} </p>
						@enderror
					</div>
				</div>
				<div class="col-6">
					<div class="form-group mb-3">
						<label for="category_slug" class="mb-2"><strong> Category Code </strong></label>
						<input type="text" name="category_slug" class="form-control" placeholder="Enter Category Slug..." value="{{$category->category_slug}}">
						@error('category_slug')
							<p style="color: red;"> {{$message}} </p>
						@enderror
					</div>
				</div>
				<div class="col-12">
					<div class="form-group mb-3">
						<label for="category_description" class="mb-2"><strong> Category Details </strong></label>
						<textarea name="category_description" class="form-control" placeholder="Enter Category Description...">{{$category->category_description}}</textarea>
						@error('category_description')
							<p style="color: red;"> {{$message}} </p>
						@enderror
					</div>
				</div>
				<div class="col-12">
					<div class="form-group mb-3">
						<label for="category_image" class="mb-2"><strong> Category Image </strong></label>
						<input type="file" name="category_image" class="form-control">
						@error('category_image')
							<p style="color: red;"> {{$message}} </p>
						@enderror
					</div>
				</div>
				<div class="col-12">
					<div class="form-group mb-3">
						<label for="" class="mb-2"><strong> Uploaded Image </strong></label>
						<img src="{{url($category->category_image)}}" width="150">
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success"> Update Category </button>
		</form>
	</div>
@endsection