@extends('backend.layouts.master')
@section('content')

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Users List</h5>
                            <hr>
                            @include('lib.messages')

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.n</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usersData as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <form action="{{route('update-role')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="criteria" value="{{$user->id}}">
                                                @if($user->role == 'admin')
                                                    <button class="btn btn-success btn-sm"
                                                            onclick="return confirm('Are you sure you want to change role?')"
                                                    >{{$user->role}}</button>
                                                @else
                                                    <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to change role?')"

                                                    >{{$user->role}}</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            @if($user->image)
                                                <img src="{{url($user->image)}}" alt="" width="100">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('view-profile',$user->id)}}"
                                               class="btn btn-primary">View</a>
                                            <a href="{{route('edit-user-profile',$user->id)}}"
                                               class="btn btn-primary">Edit</a>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

@endsection
