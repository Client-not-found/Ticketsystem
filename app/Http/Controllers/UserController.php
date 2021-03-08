<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Group;
use App\Models\User;

class UserController extends Controller
{
    public function login ( Request $request) {
        //dd($request->password);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['useUsername' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect ('dashboard');
        }

        return back()->withErrors([
            'useUsername' => 'Login Fehlgeschlagen',
        ]);
    }

    public function admin() {
        return view('acp.user',[
        'users' => User::all(),
        ]);
    }

    public function userDetails(Request $request, int $id)
    {

        return view('acp.userdetails', [
            'user' => User::where( "useKey", $id )->first(),
            'groups' => Group::all(),
        ]);

    }

    public function newUser () {
        return view('acp.newuser', [
            'groups' => Group::all(),
        ]);
    }

    public function acpSave ( Request $request ) {
        $request->validate([
            'group' => 'required',
            'username' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'mail' => 'required',
        ]);
        //dd($request->zip);
        User::create([
            'useGroId' => $request->group,
            'useUsername' => $request->username, 
            'usePassword' => bcrypt( $request->password ),
            'useFirstname' => $request->firstname,
            'useLastname' => $request->lastname,
            'useStreet' => $request->street,
            'useZIP' => $request->zip,
            'useCity' => $request->city,
            'useState' => $request->state,
            'useMail' => $request->mail,
        ]);

        return view('acp.user', [
            'users' => User::all(),
            ]);
    }

}
