@extends('backend.layouts.master')
@section('content')

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Profile</h5>
                            @include('lib.messages')
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{$userData->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" disabled id="email" name="email"
                                           value="{{$userData->email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" class="form-control" id="role" name="role"
                                           value="{{$userData->role}}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image:
                                    </label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <br>
                                    @if($userData->image)
                                        <img src="{{url($userData->image)}}" alt="" width="100">
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

@endsection
