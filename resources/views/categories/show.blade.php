@extends('layouts.main')

@section('pageContent')
	<div class="container mt-3">
		<div class="row col-12 d-flex justify-content-between align-items-center">
			<div class="col-10">
				<h2><u>{{$category->category_name}}</u> Details </h2>
			</div>
			<div class="col-2 d-flex justify-content-end pe-0">
				<a class="btn btn-success" href="{{ route('categories.index') }}"> Categories List </a> 
			</div>
		</div>
		<table>
			<tr>
				<th> Category Name: </th>
				<td> {{ $category->category_name }} </td>
			</tr>
			<tr>
				<th> Category Slug: </th>
				<td> {{ $category->category_slug }} </td>
			</tr>
			<tr>
				<th> Category Description: </th>
				<td> {{ $category->category_description }} </td>
			</tr>
			<tr>
				<th> Category Image: </th>
				<td></td>
			</tr>
			<tr>
				<th></th>
				<td><img src="{{ url($category->category_image) }}" width="200"></td>
			</tr>
			<tr>
				<th> Products: </th>
				<td>
					@foreach($category->products as $product)
						<li>{{ $product->product_name }}</li>
					@endforeach
				</td>
			</tr>
		</table>
	</div>