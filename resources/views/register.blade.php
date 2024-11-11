@extends('layout')

@section('title')
    Register Page
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto mt-5">
                @if (session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <span class="">Register Page</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST" class="row">
                            @csrf
                            <div class="mb-3 col-12">
                                <label for="exampleFormControlInput1" class="form-label">Post Name:</label>
                                <select name="post_name" id="exampleFormControlInput1" class="form-control">
                                    <option value="">Select the Post</option>
                                    @foreach ($positions as $position)
                                        <option value="{{$position->post_name}}">{{$position->post_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any())
                                    <p class="text-danger">
                                        @error('post_name')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                @endif
                            </div>
                            <div class="mb-3 col-12">
                                <label for="exampleFormControlInput2" class="form-label">Candidate Name - As per Aadhar
                                    Card:</label>
                                <input name="candidate_name" type="text" value="{{old('candidate_name')}}" class="form-control"
                                    id="exampleFormControlInput2"
                                    placeholder="Enter Name - Format (First Name) (Middle Name) (Last Name)">
                                @if ($errors->any())
                                    <p class="text-danger">
                                        @error('candidate_name')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                @endif
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleFormControlInput3" class="form-label">Father Name:</label>
                                <input name="father_name" type="text" value="{{old('father_name')}}" class="form-control" id="exampleFormControlInput3"
                                    placeholder="Enter Father's Name">
                                @if ($errors->any())
                                    <p class="text-danger">
                                        @error('father_name')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                @endif
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleFormControlInput4" class="form-label">Mobile No:</label>
                                <input name="mobile_no" type="number" value="{{old('mobile_no')}}" class="form-control" id="exampleFormControlInput4"
                                    placeholder="Enter Mobile Number">
                                @if ($errors->any())
                                    <p class="text-danger">
                                        @error('mobile_no')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                @endif
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleFormControlInput6" class="form-label">Email Id:</label>
                                <input name="email_id" type="email" value="{{old('email_id')}}" class="form-control" id="exampleFormControlInput6"
                                    placeholder="Enter Email Id">
                                @if ($errors->any())
                                    <p class="text-danger">
                                        @error('email_id')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                @endif
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleFormControlInput5" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleFormControlInput5"
                                    placeholder="Enter Password">
                                @if ($errors->any())
                                    <p class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                @endif
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-danger mx-auto">Register</button>
                            </div>
                            <div class="text-center mt-3">
                                <span class="text-capitalize ">already have a account? <a href="{{ route('loginpage') }}"
                                        class="text-danger">Login Here</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
