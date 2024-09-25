@extends('frontend.layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-md-8">
            <h1>{{$newsData->title}}</h1>
            @if($newsData->image)
                <img src="{{url($newsData->image)}}" class="img-fluid" alt="{{$newsData->title}}">
            @endif
            <p>
                {!! $newsData->description !!}
            </p>
        </div>
        <div class="col-md-4">
            <h1>Related News</h1>
            <ul>
                @foreach($relatedNews as $news)
                    <li>
                        <a href="{{route('news',$news->slug)}}">{{$news->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

@endsection
