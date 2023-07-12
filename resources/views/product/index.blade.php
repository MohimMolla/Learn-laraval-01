@extends('layouts.test')
@section('content')
<h1>Product page is here</h1>
<a class="btn btn-info" href="{{route('product.create')}}">Create Product</a>
<ul>
	@foreach ($product as $product )
	<li>{{$product->name}}</li>
		
	@endforeach
</ul>
@endsection