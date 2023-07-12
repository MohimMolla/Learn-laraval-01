@extends('layouts.test')
@section('css')
<style>
	#colorContainer li{
			display: inline-block;
			width: 100px;
			height: 100px;
			overflow: hidden;
			text-align: center;
			align-items: center;
	}
	</style>
@endsection
@section('content')
    <h1>Well come to Home</h1>
		<br>
    <hr>

		<table class="table table-bordered table-striped">
			<thead>
					<tr>
							<th >Id</th>
							<th >Name</th>
							<th >Email</th>
							<th >Action</th>
					</tr>
			</thead>
			<tbody>
					@foreach ($users as $user)
					<tr>
							<td >{{ $user->id }}</td>
							<td >{{ $user->name }}</td>
							<td >{{ $user->email }}</td>
							<td >
								<a class="btn btn-primary" href="">Edit</a> | <a class="btn btn-danger" href="">Delete</a></td>
					</tr>
					@endforeach
					{{$users->links()}}
			</tbody>
	</table>
	<hr>
	<div id="colorContainer">
		@forelse ($colors as $k=>$v)
			@if ($loop->first || $loop->last)
			<li style="background-color: {{$k}}" class="bg-info">{{$v}}</li>
			@else
			<li style="background-color: {{$k}}" class="">{{$v}}</li>
				
			@endif
		@empty
			
		@endforelse
		

	</div>
	
@endsection
