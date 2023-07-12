@extends('layouts.test')

@section('content')
    <hr>
    {{ date('Y-m-d H:i:s') }}
    @csrf
    @guest
        <h1>You are a guest</h1>
    @else
        <h1>You are not a guest</h1>
    @endguest
    <hr>
    <div class="row">
        @forelse ($products as $product)
            @component('partials.card')
                @slot('url')
                    {{ $product['image'] }}
                @endslot
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text">{{ $product['description'] }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($product['sizes'] as $size)
                        <li class="list-group-item">{{ $size }}</li>
                    @empty
                    @endforelse
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            @endcomponent
        @empty
            <h1>No products available</h1>
        @endforelse
    </div>
@endsection
