@extends('layouts.main')

@section('pageContent')
	<div class="container mt-3">
		<div class="row col-12 d-flex justify-content-between align-items-center">
			<div class="col-10">
				<h2><u>{{$product->product_name}}</u> Details </h2>
			</div>
			<div class="col-2 d-flex justify-content-end pe-0">
				<a class="btn btn-success" href="{{ route('products.index') }}"> Products List </a> 
			</div>
		</div>
		<table>
			<tr>
				<th> Product Name: </th>
				<td> {{ $product->product_name }} </td>
			</tr>
			<tr>
				<th> Product Code: </th>
				<td> {{ $product->product_code }} </td>
			</tr>
			<tr>
				<th> Product Details: </th>
				<td> {{ $product->product_details }} </td>
			</tr>
			<tr>
				<th> Product Image: </th>
				<td></td>
			</tr>
			<tr>
				<th></th>
				<td><img src="{{ url($product->product_image) }}" width="200"></td>
			</tr>
		</table>
	</div>