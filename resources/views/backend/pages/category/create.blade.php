@extends('backend.layouts.master')
@section('content')

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Category
                                <a href="{{route('manage-category.index')}}" class="float-end">Show Category</a>
                            </h5>
                            @include('lib.messages')
                            <hr>
                            <form action="{{route('manage-category.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:
                                        <span class="text-danger">
                                        @error('name')
                                            {{$message}}
                                            @enderror
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug:
                                        <span class="text-danger">
                                        @error('slug')
                                            {{$message}}
                                            @enderror
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" value="{{old('slug')}}" id="slug" name="slug">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

@endsection
