@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="d-flex justify-content-between">
                    <img src="/storage/{{ $product->images->get(1)->image }}" width="200" height="200">

                    <div>
                        <h4>{{ $product->name }}</h4>
                        <h4>{{ $product->profile->user->name }} {{ $product->profile->user->surname }}</h4>
                        <h5>+381 {{ $product->profile->phone }}</h5>
                        <h5>{{ $product->profile->city }} </h5>
                        @if ($product->profile->user->id == auth()->user()->id)
                        <a href="">
                            <h5>Edit product</h5>
                        </a>
                        @endif
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8 text-left ml-5">
            <h5>Description:</h5>
            <h6>{{ $product->description }}</h6>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            @foreach ($product->images as $image)
                <img src="/storage/{{ $image->image }}" width="200" height="200">
            @endforeach
        </div>
    </div>
</div>

@endsection