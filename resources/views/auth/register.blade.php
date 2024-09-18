<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Register Page</title>
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet">

</head>
<body>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="{{route('index')}}" class="logo d-flex align-items-center w-auto">

                                <span class="d-none d-lg-block">Emp-Project</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    @include('lib.messages')
                                </div>

                                <form class="row g-3" action="{{route('register')}}" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label for="name" class="form-label">Full Name:
                                            <span class="text-danger">
                                                {{$errors->first('name')}}
                                            </span>
                                        </label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                               id="name">
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label"> Email:
                                            <span class="text-danger">
                                                {{$errors->first('email')}}
                                            </span>

                                        </label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                               id="email">
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password:
                                            <span class="text-danger">
                                                {{$errors->first('password')}}
                                            </span>

                                        </label>
                                        <input type="password" name="password" class="form-control" id="password">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="password_confirmation" class="form-label">Confirm Password:
                                            <span class="text-danger">
                                                {{$errors->first('password_confirmation')}}
                                            </span>

                                        </label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                               id="password_confirmation">
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="{{route('login')}}">Log
                                                in</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            Designed by <a href="{{route('index')}}">Emp-Porject</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->


</body>

</html>
