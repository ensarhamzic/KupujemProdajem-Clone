@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>{{ $user->name }} {{ $user->surname }}</div>
                    @if($user->id == auth()->user()->id)
                        <div><a href="{{ route('profile.edit', $user) }}">Edit profile</a></div>
                    @endif
                </div>

                <div class="card-body">
                    <div>City: {{ $user->profile->city }}</div>
                    <div>Phone: {{ $user->profile->phone }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                @foreach ($user->profile->products as $product)
                <a href="{{ route('product.show', $product->id) }}">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <img src="/storage/{{ $product->images->get(1)->image }}" width="100" height="100">
                        <h3>{{ $product->name }}</h3>
                        Price: {{ $product->price }} {{ $product->currency }}
                    </div>
                </a>
                    
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
