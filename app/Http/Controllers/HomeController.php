<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\User;
use App\Models\FieldOfWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homeView()
    {
        $loc = session()->get('locale');
        App::setLocale($loc);


        $userData = User::paginate(12);
        $jobs = FieldOfWork::all();
        return view('pages.home', ["users" => $userData, "jobs" => $jobs]);
    }

    public function userDetailView($id)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);


        $user = User::findOrFail($id);
        return view('pages.userDetail', ['user' => $user]);
    }

    public function logout(Request $request)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);


        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function search(Request $request)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);


        $search = $request->input('search');
        $gender = $request->input('gender');
        $job = $request->input('job');

        $users = User::query()
            ->when($search, function ($q) use ($search) {
                return $q->where('linkedInUsername', 'like', 'https://www.linkedin.com/in/'."%{$search}%");
            })
            ->when($gender, function ($q) use ($gender) {
                return $q->where('gender', $gender); // Adjust field name as needed
            })
            ->when($job, function ($q) use ($job) {
                return $q->whereHas('fieldOfWorks', function ($q) use ($job) {
                    $q->where('field_of_works.id', $job); // Explicitly specify the table name
                });
            })
            ->paginate(12);

        // $users = User::paginate(12);

        $jobs = FieldOfWork::all();
        return view('pages.home', ["users" => $users, "jobs" => $jobs]);
    }

    public function friends(){
        $loc = session()->get('locale');
        App::setLocale($loc);


        $users = User::paginate(12);
        return view('pages.friend', ['users' => $users]);
    }

    public function profile(){
        $loc = session()->get('locale');
        App::setLocale($loc);

        $users = User::paginate(12);
        return view('pages.profile', ['users' => $users]);
    }
}
