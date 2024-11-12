@extends('layout')

@section('title')
    Login Page
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto mt-5">
                @if (session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-white bg-danger">
                        <span>Login Page</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Candidate Name:</label>
                                <input name="candidate_name" type="text" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Enter Candidate Name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Enter Password">
                            </div>


                            <div class="mb-3 col-12">
                                <label for="captcha" class="form-label">Enter CAPTCHA:</label>
                                <div class="d-flex align-items-center">
                                    <img src="{{ captcha_src() }}" id="captcha-image" alt="CAPTCHA Image" class="mr-2">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-secondary" onclick="refreshCaptcha()"><i class="fa-solid fa-arrow-rotate-right"></i></button>
                                </div>
                                <input type="text" name="captcha" class="form-control mt-2" placeholder="Enter CAPTCHA">
                                @error('captcha')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            
                            <div class="d-flex">
                                <button class="btn btn-danger mx-auto">Login</button>
                            </div>
                            <div class="text-center mt-3">
                                <span class="text-capitalize ">New to T.N Jobs? <a href="{{ route('registerpage') }}"
                                        class="text-danger">Register Now</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
