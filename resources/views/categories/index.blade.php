@extends('layouts.main')

@section('pageContent')
	<div class="container mt-3">
		<div class="row col-12 d-flex justify-content-between align-items-center">
			<div class="col-10">
				<h2> Categories List </h2>
			</div>
			<div class="col-2 d-flex justify-content-end pe-0">
				<a class="btn btn-info me-1" href="{{ url('/') }}"> Home </a> 
				<a class="btn btn-success" href="{{ route('categories.create') }}"> Add Category </a> 
			</div>
		</div>

		@if($message = session("message"))
			<div class="alert alert-success">{{ $message }}</div>
		@endif
		<table class="table table-striped table-bordered">
			<tr>
				<th> S.No. </th>
				<th> Category Name </th>
				<th> Category Code </th>
				<th width="400"> Category Details </th>
				<th> Category Image </th>
				<th> Actions </th>
			</tr>
			@if(empty($categories->toArray()))
				<tr>
					<th colspan="6"> No Category Added! Add a new category first... </th>
				</tr>
			@else 
				@foreach($categories as $category)
					<tr>
						<td> {{$category->id}} </td>
						<td> {{$category->category_name}} </td>
						<td> {{$category->category_slug}} </td>
						<td> {{$category->category_description}} </td>
						<td> <img src="{{url($category->category_image)}}" width="100"></td>
						<td> <div class="d-flex"><a href="{{route('categories.show', $category->id)}}" class="btn btn-info me-2">Show</a><a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary me-2">Edit</a>
							<form action="{{route('categories.destroy', $category->id)}}" method="post" onsubmit="deleteCat(this)">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
							</div>
						</td>
					</tr>
				@endforeach
			@endif
		</table>
		{{ $categories->links() }}
	</div>
@endsection

@section('scripts')
	<script>
		function deleteCat(form) {
			event.preventDefault();

			if(confirm('Are you sure to delete?')) {
				form.submit();
			}
		}
	</script>
@endsection