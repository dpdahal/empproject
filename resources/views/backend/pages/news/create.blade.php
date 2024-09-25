@extends('backend.layouts.master')
@section('content')

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add News
                                <a href="{{route('manage-news.index')}}" class="float-end"> Show News</a>
                            </h5>
                            @include('lib.messages')
                            <hr>
                            <form action="{{route('manage-news.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="category_id" class="form-label">
                                        Category:
                                        <span class="text-danger">
                                        @error('category_id')
                                        {{$message}}
                                        @enderror
                                    </label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categoryData as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="title" class="form-label">Title:
                                        <span class="text-danger">
                                        @error('title')
                                            {{$message}}
                                            @enderror
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" value="{{old('title')}}" id="title"
                                           name="title">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="slug" class="form-label">Slug:
                                        <span class="text-danger">
                                        @error('slug')
                                            {{$message}}
                                            @enderror
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" value="{{old('slug')}}" id="slug"
                                           name="slug">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="image" class="form-label">Image:
                                        <span class="text-danger">
                                        @error('image')
                                            {{$message}}
                                            @enderror
                                    </span>
                                    </label>
                                    <input type="file" class="form-control" id="image" name="image">

                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="form-label">
                                        Description:
                                        <span class="text-danger">
                                        @error('description')
                                        {{$message}}
                                        @enderror
                                    </label>
                                    <textarea name="description" id="description" class="form-control"
                                              rows="5">{{old('description')}}</textarea>

                                </div>
                                <div class="form-group mb-2">
                                    <button class="btn btn-success">Add Record</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('description');
        });
    </script>

@endsection
