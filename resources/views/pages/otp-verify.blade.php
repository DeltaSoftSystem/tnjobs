@extends('layout')

@section('title')
    Otp Verification
@endsection

@section('content')
    <div class="container">
        <div class="card col-6 mx-auto mt-4">
            <div class="card-header bg-danger text-white"><span>Otp Verification</span></div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="col-12 mb-3">
                        <label for="email_otp" class="form-label">Enter OTP shared on Registration E-Mail id.:</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter OTP">
                    </div>
                    <div class="col-12">
                        <label for="sms_otp" class="form-label">Enter OTP shared on Registration Mobile No.:</label>
                        <input type="text" name="sms" id="sms" class="form-control" placeholder="Enter OTP">
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-danger mx-auto mt-3">Click to Verify Mobile No. and E-Mail</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection