@extends('backend.layouts.master')
@section('content')

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Category
                                <a href="{{route('manage-category.create')}}" class="float-end">Add Category</a>
                            </h5>
                            @include('lib.messages')
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.n</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categoryData as $category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->name}}
                                            - ({{$category->blog->count()}})

                                        </td>
                                        <td>
                                            @if($category->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('manage-category.edit', $category->id)}}"
                                               class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{route('manage-category.destroy', $category->id)}}"
                                                  method="post"
                                                  style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="d-flex justify-content-center">
                                {{$categoryData->links()}}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

@endsection
