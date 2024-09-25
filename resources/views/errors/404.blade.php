@extends('frontend.layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>404</h1>
                <h2>Page not found</h2>
                <p>Sorry, the page you are looking for could not be found.</p>
                <a href="{{route('index')}}">Goto home</a>
            </div>
        </div>
    </div>

@endsection
