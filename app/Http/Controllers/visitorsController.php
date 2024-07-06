<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\Chapter;
use App\Models\chapterModel;
use App\Models\courseAddModel;
use App\Models\Lecture;
use App\Models\user;
use App\Models\profileModel;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class visitorsController extends Controller
{
    //
    public function index()
    {
        $categoryModel = categoryModel::get();

        return view('visitors.index', compact('categoryModel'));
    }
    public function courseDetail($id)
    {
        // Assuming you're fetching the course by its ID
        $courseAddModel = CourseAddModel::find($id);
        // Fetching user profile
        $profile = ProfileModel::where('user_id', Auth::user()->id)->first();
        $chapterModel = Chapter::where('course_id', $id)->first();
        // Convert final_price and discount_price to numeric values
        $finalPrice = (float) str_replace('$', '', $courseAddModel->final_price);
        $discountPrice = (float) str_replace('$', '', $courseAddModel->discount_price);

        // Calculate discount percentage
        if ($finalPrice > 0) {
            $discountPercentage = ((1 - ($discountPrice / $finalPrice)) * 100);
            $discountPercentageFormatted = round($discountPercentage, 2) . '% off'; // Rounds to 2 decimal places
        } else {
            $discountPercentageFormatted = 'Invalid final price';
        }

        // Return view with course and profile data
        return view('visitors.course-details', compact('chapterModel', 'courseAddModel', 'profile', 'discountPercentageFormatted'));
    }


    public function courses()
    {
        $courseAddModel = courseAddModel::where('status', true)->get();
        return view('visitors.courses', compact('courseAddModel'));
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
        $profile = profileModel::where('user_id', Auth::user()->id)->first();
        $courseAddModel = courseAddModel::where('instructor_id', Auth::user()->id)->get();
        $profileModel = profileModel::where('user_id', Auth::user()->id)->first();
        return view('visitors.instructor-profile', compact('profile', 'courseAddModel', 'profileModel'));
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
        // Retrieve the profile model by user_id or create a new instance
        $profile = ProfileModel::where('user_id', $request->user_id)->first();

        if (!$profile) {
            // Create a new profile if none exists
            $profile = new ProfileModel;
            $profile->user_id = $request->user_id;
        }

        // Handle common fields
        $profile->about = $request->about;
        $profile->skill = $request->skill;
        $profile->phone_number = $request->phone_number;
        $profile->nationality = $request->nationality;

        // Handle empty or null values for education
        $education_titles = array_filter($request->education_title);
        $education_descriptions = array_filter($request->education_description);
        $education_dates = array_filter($request->education_date);

        // Only update education fields if new values are provided
        if (!empty($education_titles)) {
            $profile->education_title = implode(',', $education_titles);
        }
        if (!empty($education_descriptions)) {
            $profile->education_description = implode(',', $education_descriptions);
        }
        if (!empty($education_dates)) {
            $profile->education_date = implode(',', $education_dates);
        }

        // Handle empty or null values for experiences
        $experience_titles = array_filter($request->experience_title);
        $experience_descriptions = array_filter($request->experience_description);
        $experience_dates = array_filter($request->experience_date);

        // Only update experience fields if new values are provided
        if (!empty($experience_titles)) {
            $profile->experience_title = implode(',', $experience_titles);
        }
        if (!empty($experience_descriptions)) {
            $profile->experience_description = implode(',', $experience_descriptions);
        }
        if (!empty($experience_dates)) {
            $profile->experience_date = implode(',', $experience_dates);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image_path = rand(0, 9999) . time() . '.' . $request->image->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $image_path);
            $profile->image = $image_path;
        }

        // Save the profile instance
        $profile->save();

        // Optionally, you can use dd($profile); here for debugging
        return redirect()->back();
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
    public function courseAdd()
    {
        $categoryModel = categoryModel::get();
        return view('visitors.courseadd', compact('categoryModel'));
    }
    public function chaptersAdd($id)
    {
        $courseId = $id;
        $profileModel = ProfileModel::where('user_id', Auth::user()->id)->first();
        $chapterModel = Chapter::where('course_id', $courseId)->first();

        return view('visitors.chapters', compact('profileModel', 'courseId', 'chapterModel'));
    }
    public function coursePublished($id)
    {
        $courseAddModel = courseAddModel::where('id', $id)->first();
        if ($courseAddModel) {
            // Update the status to '1' (published)
            $courseAddModel->status = true;

            // Save the changes
            $courseAddModel->save();
        }
        return redirect()->back();
    }
    public function chaptersSubmit(Request $request)
    {
    }





    public function courseFormSubmit(Request $request)
    {
        $courseAddModel = new CourseAddModel();
        $courseAddModel->title = $request->title;

        if ($request->hasFile('image')) {
            $image_path = rand(0, 9999) . time() . '.' . $request->image->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads'), $image_path);
            $courseAddModel->image = $image_path;
        }

        if ($request->hasFile('video')) {
            $video_path = $request->file('video')->store('uploads', 'public');
            $courseAddModel->video = $video_path;
        }

        $courseAddModel->total_lesson = $request->total_lesson;
        $courseAddModel->total_hours = $request->total_hours;
        $courseAddModel->discount_price = $request->discount_price;
        $courseAddModel->final_price = $request->final_price;
        $courseAddModel->instructor_id = $request->instructor_id;
        $courseAddModel->description = $request->description;


        if ($request->filled('inputCategory')) {
            $categoryModel = new CategoryModel();
            $categoryModel->name = $request->inputCategory;
            $categoryModel->save();

            // Assign the category_id to the courseAddModel
            $courseAddModel->category = $categoryModel->id;
        } else {
            // Assign the category_id from the select dropdown
            $courseAddModel->category = $request->category;
        }

        $courseAddModel->save();
        return redirect()->back();
    }
}
