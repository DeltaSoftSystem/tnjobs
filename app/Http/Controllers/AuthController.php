<?php

namespace App\Http\Controllers;

use App\Helpers\SMSHelper;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        $positions = Position::all();
        // return $positions;
        return view('register', compact('positions'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'candidate_name' => 'required|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'mobile_no' => 'required|numeric|digits:10',
            'email_id' => 'required|string|email|unique:users,email_id',
            'password' => 'required|string|min:8',
            'post_name' => 'required|string',
            'captcha' => 'required|captcha',
        ]);

        $emailOtp = rand(100000, 999999);
        $mobileOtp = rand(100000, 999999);

        session([
            'post_name' => $request->post_name,
            'candidate_name' => $request->candidate_name,
            'father_name' => $request->father_name,
            'mobile_no' => $request->mobile_no,
            'email_id' => $request->email_id,
            'password' => $request->password,
            'email_otp' => $emailOtp,
            'sms_otp' => $mobileOtp,
        ]);

        $email = $request->email_id;
        // Mail::html("Dear " . $request->candidate_name . " Use " . $emailOtp . " as OTP for verification of your Email id. Tnmhr. Regards T&amp;M Services Consulting Pvt. Ltd.", function ($msg) use ($email) {
        //     $msg->to($email)->subject('Verify email via OTP with TNMHR.');
        // });

        // if ($request->mobile_no) {
        //     SMSHelper::setSMSConfig($request->mobile_no, "Use " . $mobileOtp . " as OTP for verification of your mobile number. Tnmhr");
        // }

        return redirect()->route('otp.verify');
    }

    public function showOtpForm()
    {
        return view('pages.otp-verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email_otp' => 'nullable|numeric',
            'sms_otp' => 'nullable|numeric',
        ]);


        $emailOtp = session('email_otp');
        $smsOtp = session('sms_otp');
        $postName = session('post_name');
        $candidateName = session('candidate_name');
        $fatherName = session('father_name');
        $mobileNo = session('mobile_no');
        $emailId = session('email_id');
        $password = session('password');

        $user = new User();
        if ($request->email_otp == $emailOtp && $request->sms_otp == $smsOtp) {
            $user->post_name = $postName;
            $user->candidate_name = $candidateName;
            $user->father_name = $fatherName;
            $user->mobile_no = $mobileNo;
            $user->email_id = $emailId;
            $user->password = $password;

            $user->save();

            // Mail::html("Your registration completed Successfully. With Name : ".$candidateName.". Click to Login page", function ($msg) use ($emailId) {
            //     $msg->to($emailId)->subject('Verify email via OTP with TNMHR.');
            // });

            // if ($mobileNo) {
            //     SMSHelper::setSMSConfig($mobileNo, "Your registration completed Successfully. With Name : ".$candidateName.". Click to Login page");
            // }
            session()->forget(['email_otp', 'sms_otp', 'post_name', 'candidate_name', 'father_name','mobile_no','email_id','password']);
            return redirect()->route('loginpage')->with('status', 'OTP verified successfully!');
        }
        else {
            return redirect()->back()->with('status','Invalid OTP. Both OTPs must be correct.');
        }
    }


    // Show Login Form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle Login Logic
    public function login(Request $request)
    {
        $request->validate([
            'candidate_name' => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ]);

        if (Auth::attempt(['candidate_name' => $request->candidate_name, 'password' => $request->password])) {
            return redirect()->route('dashboard'); // Redirect to the dashboard or home
        }

        return redirect()->back()->with('status', 'Candidate Name : ' . $request->candidate_name . ' is Invalid');
    }

    // Handle Logout Logic
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
