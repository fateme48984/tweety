@extends('layouts.app')

@section('content')
<div class="lg:flex lg:justify-between">
    <div class="lg:w-32">
        @include('partial._sidebar-links')
    </div>
    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
        <div class="border border-blue-300 rounded-lg px-8 py-6 mb-8">
            @include('partial._publish-tweet')
        </div>
        <div class="border border-gray-300 rounded-lg">
            @include('partial._tweets')
            @include('partial._tweets')
            @include('partial._tweets')
            @include('partial._tweets')
        </div>
    </div>
    <div class="lg:w-1/6 bg-blue-100 p-4 rounded-lg">@include('partial._friends-list')</div>
</div>
@endsection
