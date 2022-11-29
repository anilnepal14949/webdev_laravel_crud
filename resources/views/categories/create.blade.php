@extends('layouts.main')

@section('pageContent')
	<div class="container mt-3">
		<div class="row col-12 d-flex justify-content-between align-items-center">
			<div class="col-10">
				<h2> Create Category </h2>
			</div>
			<div class="col-2 d-flex justify-content-end pe-0">
				<a class="btn btn-success" href="{{ route('categories.index') }}"> Categories List </a> 
			</div>
		</div>
		@if($errors->any())
			<div class="alert alert-info" role="alert">
				<div class="alert-text">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
		<form class="form mt-5" method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-6">
					<div class="form-group mb-3">
						<label for="category_name" class="mb-2"><strong> Category Name </strong></label>
						<input type="text" name="category_name" class="form-control" placeholder="Enter Category Name..." value="{{old('category_name')}}">
						@error('category_name')
							<p style="color: red;"> {{$message}} </p>
						@enderror
					</div>
				</div>
				<div class="col-6">
					<div class="form-group mb-3">
						<label for="category_slug" class="mb-2"><strong> Category Slug </strong></label>
						<input type="text" name="category_slug" class="form-control" placeholder="Enter Category Code..." value="{{old('category_slug')}}">
						@error('category_slug')
							<p style="color: red;"> {{$message}} </p>
						@enderror
					</div>
				</div>
				<div class="col-12">
					<div class="form-group mb-3">
						<label for="category_description" class="mb-2"><strong> Category Description </strong></label>
						<textarea name="category_description" class="form-control" placeholder="Enter Category Description...">{{old('category_description')}}</textarea>
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
			</div>
			<button type="submit" class="btn btn-success"> Add Category </button>
		</form>
	</div>
@endsection