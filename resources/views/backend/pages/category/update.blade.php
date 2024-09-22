@extends('backend.layouts.master')
@section('content')

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Category
                                <a href="{{route('manage-category.index')}}" class="float-end">Show Category</a>
                            </h5>
                            @include('lib.messages')
                            <hr>
                            <form action="{{route('manage-category.update', $category->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:
                                        <span class="text-danger">
                                        @error('name')
                                            {{$message}}
                                            @enderror
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" value="{{$category->name}}" id="name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug:
                                        <span class="text-danger">
                                        @error('slug')
                                            {{$message}}
                                            @enderror
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" value="{{$category->slug}}" id="slug" name="slug">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="active" {{$category->status == 'active' ? 'selected' : ''}}>Active</option>
                                        <option value="inactive" {{$category->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

@endsection
