<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //to register page
    public function register()
    {
        return view('users.register');
    }

    //to log in page
    public function login()
    {
        return view('users.login');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['email', 'required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $formFields['status'] = 'public';

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User created and login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['email', 'required'],
            'password' => 'required|min:6'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            if (auth()->user()->status == 'admin') {
                return redirect('/adminHomePage')->with('message', 'You are now logged in as an admin');
            } else {
                return redirect('/')->with('message', 'You are now logged in');
            }
        }

        return back()->withErrors(['email' => 'Invalid combination or email is not exist'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have sucessfully log out, Thank you!');
    }

    public function updateProfile()
    {
        return view('users.manageProfile', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request, User $user)
    {
        // ddd($user);
        $formFileds = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['email', 'required']
        ]);
        if($request->filled('old_password')){
            $request->validate([
                'old_password' => 'required|min:6',
                'password' => 'required|confirmed|min:6'
            ]);

            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }
            
            $formFileds['password'] = bcrypt($request->password);
        }


        if ($user->update($formFileds)) {
            return back()->with('message', 'Profile updated successfuly');
        } else {
            return back()->with('message', 'Profile updated unsuccessfuly');
        }
    }

    public function adminPage()
    {
        if(request('list') === 'user'){
            return view('users.adminHomePage', [
                'users' => User::all()
            ]);
        }
        return view('users.adminHomePage', [
            'users' => User::all(),
            'postings' => Posting::all(),
        ]);
    }

    public function destroy_user(User $user)
    {
        if ($user != auth()->user()) {
            $user->delete();
            return back()->with('message', 'User deleted successfuly');
        }

        return back()->with('message', 'User delete unsuccessfuly. Unable to delete current account.');
    }

    public function admin_updateUserProfile(User $user)
    {
        return view('users.adminManageUser', [
            'user' => $user
        ]);
    }

    public function admin_updateUser(Request $request, User $user)
    {
        // ddd($user);

        $formFileds = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['email', 'required']
        ]);

        if ($user->update($formFileds)) {
            return back()->with('message', 'Profile updated successfuly');
        } else {
            return back()->with('message', 'Profile updated unsuccessfuly');
        }
    }

    public function admin_updateClothingDetails(Posting $posting)
    {
        return view('cloth.adminManageClothing', [
            'posting' => $posting
        ]);
    }

    public function admin_updateClothing(Request $request, Posting $posting)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'brand' => 'required',
            'location' => 'required',
            'price' => 'required|numeric',
            'color' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');      //logos here will be a folder that store logo in storage->app->public
        }

        $posting->update($formFields);

        return back()->with('message', 'Item updated succesfull');
    }
}
