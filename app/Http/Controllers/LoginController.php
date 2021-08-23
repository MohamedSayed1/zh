<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::attempt(['code' =>$request->get('code'), 'password' =>$request->get('password'),'is_active'=>1]))
        {

                if(in_array(Auth()->user()->group_id,[1,2]))
                    return redirect('dashboard/users');
                else
                    return view('welcome');

        }
        else {
            $errors = ['Please verify the code or password'];
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($errors);
        }

    }
}
