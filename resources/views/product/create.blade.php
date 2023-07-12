@extends('layouts.test')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h1>Product create</h1>
                <div class="card mt-3">
                    <form action="{{ url('products/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control"  value="{{ old('name') }}">
                            @if ($errors->has('name'))
                               <span class="text-danger">{{$errors->first('name')}}</span> 
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Discription</label>
                            <textarea name="discription" class="form-control" id=""  value="{{ old('discription') }}"></textarea>
                            @if ($errors->has('discription'))
                            <span class="text-danger">{{$errors->first('discription')}}</span> 
                         @endif
                        </div>
                        <div class="form-group">
                            <label for="">Image Upload</label>
                            <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        
                        {{-- <div class="form-group"> --}}
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        {{-- </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
