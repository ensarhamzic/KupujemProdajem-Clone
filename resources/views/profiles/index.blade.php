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
</div>
@endsection
