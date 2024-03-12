<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Auth;
use Validator;
use App\Models\User;

class LoginController extends Controller
{

    protected function index(): View
    {
        if (Auth::check()) {
            return view('dashboard.index');
        } else {
            return view('login.index');
        }
    }

    protected function authenticate(Request $request): RedirectResponse
    {
        if ($this->loginFormValidate($request)->fails()) {
            return redirect()->back()->withInput()
            ->withErrors($this->loginFormValidate($request)->messages());
        } else {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                toastr()->success('Welcome to Lilac Infotech App');
                return redirect()->route('dashboard');
            } else {
                toastr()->error('Invalid user name or password');
                return redirect()->back();
            }
        }
    }

    private function loginFormValidate($request): object
    {
        return Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email is mandatory.',
            'password.required' => 'Password is mandatory.'
        ]);
    }

    protected function profile(): View
    {
        $profile = User::find(Auth::id());
        return view('login.profile')->with(compact('profile'));
    }

    protected function saveProfile(Request $request): JsonResponse
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'email'=>'bail|required|unique:users,email,' . Auth::id() . ',id,deleted_at,NULL',
        ]);
        if ($validatedData->fails()) {
            $jsonArray = [
                'status' => 'validationError', 
                'messages' => $validatedData->messages()
            ];
        } else {
            $user = User::find(Auth::id());
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if($request->filled('change_password')){
                $user->password = bcrypt($request->input('user_password'));
            }
            $user->save();
            toastr()->success('Profile Updated Successfully!');
            $jsonArray = [
                'status'=>'success',
                'next'=>route('dashboard')
            ];
        }
        return response()->json($jsonArray);
    }

    protected function logout(): RedirectResponse
    {
        toastr()->success('Successfully Logout.');
        Auth::logout();
        return redirect()->route('login');
    }
}
