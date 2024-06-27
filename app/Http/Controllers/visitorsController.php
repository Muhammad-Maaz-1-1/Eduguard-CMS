<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\profileModel;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class visitorsController extends Controller
{
    //
    public function index()
    {
        return view('visitors.index');
    }
    public function courseDetail()
    {
        return view('visitors.course-details');
    }
    public function courses()
    {
        return view('visitors.courses');
    }
    public function about()
    {
        return view('visitors.about');
    }
    public function contact()
    {
        return view('visitors.contact');
    }
    public function login()
    {
        return view('visitors.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function loginSubmit(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function register()
    {
        return view('visitors.register');
    }
    public function registerSubmit(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Encrypt the password before saving
        $user->save();
        return redirect()->route('login');
    }
    public function instructorProfile()
    {
        $profile = profileModel::first();

        return view('visitors.instructor-profile',compact('profile'));
    }
    public function instructorForm()
    {
        return view('visitors.become-instructor');
    }
    public function checkout()
    {
        return view('visitors.checkout');
    }
    public function cart()
    {
        return view('visitors.cart');
    }
    public function studentsProfile()
    {
        $profile = profileModel::first();

        return view('visitors.students-profile', compact('profile'));
    }
    public function editStudentsProfile()
    {
        $user = user::get();
        $profile = profileModel::where('user_id', Auth::user()->id)->first();

        return view('visitors.editprofile', compact('user', 'profile'));
    }
    public function editInstructorProfile(Request $request)
    {
        $user = user::get();
        $profile = profileModel::where('user_id', Auth::user()->id)->first();
        return view('visitors.editInstructorProfile', compact('user', 'profile'));
    }
    public function editInstructorProfileSubmit(Request $request)
    {
        $profile = new profileModel;
        $profile->user_id = $request->user_id;      
        $profile->about = $request->about;
        $profile->skill = $request->skill;
        $profile->phone_number = $request->phone_number;
        $profile->nationality = $request->nationality;
        
        // Debug the input data
        error_log('Education Title: ' . print_r($request->education_title, true));
        error_log('Education Description: ' . print_r($request->education_description, true));
        error_log('Education Date: ' . print_r($request->education_date, true));
        
        // Handle empty or null values
        $education_titles = array_filter($request->education_title);
        $education_descriptions = array_filter($request->education_description);
        $education_dates = array_filter($request->education_date);
        
        // Concatenate properly
        $profile->education_title = implode(',', $education_titles);
        $profile->education_description = implode(',', $education_descriptions);
        $profile->education_date = implode(',', $education_dates);
        
        // Handle image upload
        $image_path = '';
        if ($request->hasFile('image')) {
            $image_path = rand(0, 9999) . time() . '.' . $request->image->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $image_path);
            $profile->image = $image_path;
        }
        
        $profile->save();


    }


    public function editStudentsProfileSubmit(Request $request)
    {
        $user = user::get();
        $profile = profileModel::where('id', $request->user_id)->first();
        if ($profile) {
            $profile->user_id = $request->user_id;
            $profile->skill = $request->skill;
            $profile->about = $request->about;
            $profile->phone_number = $request->phone_number;
            $profile->nationality = $request->nationality;
            $image_path = '';

            if ($request->image) {
                $image_path = rand(0, 9999) . time() . '.' . $request->image->getClientOriginalName();
                $request->file('image')->move(public_path('uploads'), $image_path);
            }
            $profile->image = $image_path;
        } else {
            $profile = new profileModel;
            $profile->user_id = $request->user_id;
            $profile->skill = $request->skill;
            $image_path = '';
            if ($request->image) {
                $image_path = rand(0, 9999) . time() . '.' . $request->image->getClientOriginalName();
                $request->file('image')->move(public_path('uploads'), $image_path);
            }
            $profile->image = $image_path;
            $profile->about = $request->about;
            $profile->phone_number = $request->phone_number;
            $profile->nationality = $request->nationality;
        }
        $profile->save();
        return redirect()->back();
    }
    public function watch()
    {
        return view('visitors.watch');
    }
}
