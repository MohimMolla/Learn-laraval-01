@extends('layouts.test')
@section('content')
<h1>Update Category</h1>
<form action="{{route('category.update',$cat->id)}}" method="post">
    @csrf
    @method('put')
    @include('categories.form', ['cat' => $cat])
    <input type="submit" value="Update Category">
</form>
<a class="btn btn-outline-secondary" href="{{route('category.index')}}">Back To Category</a>
@endsection
