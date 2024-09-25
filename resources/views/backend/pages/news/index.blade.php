@extends('backend.layouts.master')
@section('content')

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">News List
                                        <a href="{{route('manage-news.create')}}" class="float-end">Add News</a>
                                    </h5>
                                    @include('lib.messages')
                                    <hr>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <form action="{{route('manage-news.index')}}">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input type="search" name="search" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary">
                                                    <i class="bi bi-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Posted By</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($newsData as $key=>$news)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$news->title}}</td>
                                                <td>
                                                    {{$news->category->name}}
                                                </td>
                                                <td>
                                                    {{$news->user->name}}
                                                </td>
                                                <td>
                                                    @if($news->image)
                                                        <img src="{{url($news->image)}}" alt="" style="width: 100px;">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('manage-news.edit',$news->id)}}"
                                                       class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{route('manage-news.destroy',$news->id)}}"
                                                          method="post"
                                                          class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
