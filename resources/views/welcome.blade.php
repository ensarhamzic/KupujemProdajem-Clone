@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Your profile</div>

                <div class="card-body">
                    <h4><a href="@auth /profile/{{ auth()->user()->id }} @else /login @endauth">Go to profile</a></h4>
                    <h4><a href="@auth product/create @else /login @endauth">Add product</a></h4>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest products</div>

                <div class="card-body">
                   Latest Products
                </div>
            </div>
        </div>
    </div>
</div>
@endsection