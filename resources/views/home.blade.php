{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}
{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}


<x-home-master>
    @section('content')
        <h1>JOURNAL</h1>

        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>

        <!-- Blog Post -->
    @foreach($posts as $post)
{{--            <h2 class="card-title">Close date: {{$post->closed_at}}</h2>--}}
{{--            <h2 class="card-title">Current date: {{Carbon\Carbon::now()->toDateTimeString()}}</h2>--}}
        @if($post->closed_at > Carbon\Carbon::now()->toDateTimeString())
        <div class="card mb-4">
{{--            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">--}}
            <div class="card-body">
                <h2 class="card-title">{{$post->name}}</h2>
                <p class="card-text">{{Str::limit($post->description, '50', '.....')}}</p>
                <a href="{{route('post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on {{$post->created_at->diffForHumans()}} by
                <a href="#">{{$post->user->name}}</a>
            </div>
        </div>
            @endif
        @endforeach


        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>
    @endsection
</x-home-master>
