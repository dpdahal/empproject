@extends('backend.layouts.master')
@section('content')

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">News Details
                                <a href="{{route('manage-news.index')}}" class="float-end">Show News</a>
                            </h5>
                            @include('lib.messages')
                            <hr>
                            <h3>Title: {{$blogData->title}}</h3>
                            <h3>Slug: {{$blogData->slug}}</h3>
                            @if($blogData->image)
                                <img src="{{url($blogData->image)}}" alt="{{$blogData->title}}" class="img-fluid">
                            @endif
                            <p>
                                {!!  $blogData->description !!}
                            </p>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
