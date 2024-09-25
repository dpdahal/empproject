<?php

function limitDescription($description)
{
    $limit = 100;
    if (strlen($description) > $limit) {
        return substr($description, 0, $limit) . '...';
    }
    return $description;

}


?>


@extends('frontend.layouts.app')

@section('content')
    <div class="row mt-3 mb-5">
        <div class="col-md-12">
            <h2>News List</h2>
        </div>
    </div>
    <div class="row">
        @foreach($newsData as $news)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($news->image)
                        <img src="{{url($news->image)}}" height="200" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$news->title}}</h5>
                        <p class="card-text">
                            {!! limitDescription($news->description)  !!}
                        </p>
                        <a href="{{route('news',$news->slug)}}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
