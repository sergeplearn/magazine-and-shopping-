<?php

namespace App\Http\Controllers\addAdmin;


use App\Events\NewUserHasRegisterEvent;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Gate;

class AddadminController extends Controller
{

use RegistersUsers;




    public function index()
    {
        if (! Gate::allows('view_admin')) {
            abort(403);
        }
        $users = User::where('role',1)->paginate(5);
      return view('admin.index',compact('users'));
    }


    public function create()

    {  if (! Gate::allows('view_admin')) {
        abort(403);
    }
        return view('admin.create');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function store(Request $request)
    {
        if (! Gate::allows('view_admin')) {
            abort(403);
        }
         Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'role' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $newuser = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);
        event(new NewUserHasRegisterEvent($newuser));
   return redirect()->route('User.index');
    }

    public function destroy(User $User)
    {
        $User->delete();
        return redirect()->route('User.index');


    }

}
