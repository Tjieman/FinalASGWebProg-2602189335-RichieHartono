<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\FieldOfWork;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function registerView()
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        $fieldsOfWork = FieldOfWork::all();
        return view('pages.register', ['fieldsOfWork' => $fieldsOfWork]);
    }

    public function registerStore(Request $request)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        $incomingFields = $request->validate([
            "gender" => ['required'],
            "linkedInUsername" => ['required', 'min:3', 'max:254', 'unique:users'],
            "mobileNumber" => ['required', 'numeric', 'digits_between:5,13'],
            "password" => ['required', 'min:5', 'max:254', 'confirmed'],
            "fieldOfWork" => ['required', 'array', 'min:3'],
            "fieldOfWork.*" => ['exists:field_of_works,id'],
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $incomingFields['walletBalance'] = 0;
        $incomingFields['linkedInUsername'] = 'https://www.linkedin.com/in/' . $incomingFields['linkedInUsername'];
        $incomingFields['image'] = rand(1, 3) . '.jpeg';
        $incomingFields['paymentAmount'] = rand(100000, 125000);
        $incomingFields['isPaid'] = 0;

        if (User::where('linkedInUsername', $incomingFields['linkedInUsername'])->exists()) {
            return back()->withErrors(['linkedInUsername' => 'The LinkedIn username is already taken.']);
        }

        $user = User::create($incomingFields);
        $user->fieldOfWorks()->sync($incomingFields['fieldOfWork']);
        return redirect('/login')->with('success', 'Account Created Successfully!');
    }

    public function registerView2()
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        return view('pages.register2');
    }

    public function registerStore2(Request $request)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);


        $customMessages = [
            'paymentAmount.min' => 'You are still underpaid ' . (Auth::user()->paymentAmount - $request->input('paymentAmount')),
        ];

        $incomingFields = $request->validate([
            'paymentAmount' => ['required', 'numeric', 'min:' . Auth::user()->paymentAmount],
        ], $customMessages);

        Auth::user()->walletBalance += ($request->input('paymentAmount') - Auth::user()->paymentAmount);
        Auth::user()->isPaid = 1;

        Auth::user()->save();
        return redirect()->intended(route('home'));
    }



    public function loginView()
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        return view('pages.login');
    }

    public function loginAuth(Request $request)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        $incomingFields = $request->validate([
            'linkedInUsername' => ['required', 'min:3', 'max:254'],
            'password' => ['required', 'min:5', 'max:254'],
        ]);

        $incomingFields['linkedInUsername'] = 'https://www.linkedin.com/in/' . $incomingFields['linkedInUsername'];
        if (Auth::attempt($incomingFields)) {
            $request->session()->regenerate();

            if (Auth::user()->isPaid == 1) {
                return redirect()->intended(route('home'));
            } else {
                return redirect()->intended(route('register2'));
            }
        }
        return redirect()->back()->with('error', 'Wrong Credentials');
    }

    public function follow($id)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        $follower = Auth::user();

        $user = User::findOrFail($id);

        $follower->followings()->attach($user);

        $username = str_replace('https://www.linkedin.com/in/', '', $follower->linkedInUsername);

        // dd([
        //     'user_id' => $user->id,
        //     'message' => $username.' is following you!'
        // ]);
        Notification::create([
            'user_id' => $user->id,
            'message' => $username . ' is following you!'
        ]);


        $userData = User::paginate(12);
        return redirect()->route('home', ["users" => $userData]);
    }

    public function unfollow($id)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        $follower = Auth::user();

        $user = User::findOrFail($id);

        $follower->followings()->detach($user);

        $username = str_replace('https://www.linkedin.com/in/', '', $follower->linkedInUsername);
        Notification::create([
            'user_id' => $user->id,
            'message' => $username . ' is no longer following you!'
        ]);

        $userData = User::paginate(12);
        $jobs = FieldOfWork::all();
        return view('pages.home', ["users" => $userData, "jobs" => $jobs]);
    }

    public function userNotification()
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        $notif = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();
        // dd($notif);
        return view('pages.notification', ['notifs' => $notif]);
    }

    public function callWithFriend($id)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        $caller = Auth::user();
        $friend = User::findOrFail($id);

        $username = str_replace('https://www.linkedin.com/in/', '', $caller->linkedInUsername);
        Notification::create([
            'user_id' => $friend->id,
            'message' => $username . ' is calling you!'
        ]);

        return redirect()->away('https://tinyurl.com/PPTI14');
    }

    public function changeLanguage($locale)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        // if (!in_array($locale, ['en', 'id'])) {
        //     abort(400);
        // }
        // session(['locale' => $locale]);
        session(['locale' => 'en']);
        return redirect()->back();
    }

}
