@extends('backend.layouts.master')
@section('content')

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>View Profile</h1>
                            @include('lib.messages')

                            <h1 class="card-title">Name: {{$userData->name}}</h1>
                            <h1 class="card-title">Email: {{$userData->email}}</h1>
                            <h1 class="card-title">Role: {{$userData->role}}</h1>
                            <h1 class="card-title">Image:
                                @if($userData->image)
                                    <img src="{{url($userData->image)}}" alt="" width="100">
                                @endif
                            </h1>
                            <h1 class="card-title">
                                Created At: {{$userData->created_at}}
                            </h1>



                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

@endsection
