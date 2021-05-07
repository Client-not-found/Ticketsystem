<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Group;
use App\Models\User;

class UserController extends Controller
{
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

    public function acpEdit ( Request $request ) {
        $request->validate([
            'group' => 'required',
            'username' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'mail' => 'required',
        ]);

        DB::table('users')
            ->where('useKey', 1)
            ->update(['useGroId' => $request->group],
            ['useUsername' => $request->username], 
            ['usePassword' => bcrypt( $request->password )],
            ['usepassword_confirmation'=> bcrypt( $request->password_confirmation)],
            ['useFirstname' => $request->firstname],
            ['useLastname' => $request->lastname],
            ['useStreet' => $request->street],
            ['useZIP' => $request->zip],
            ['useCity' => $request->city],
            ['useState' => $request->state],
            ['useMail' => $request->mail]);

        return view('acp.user', [
            'users' => User::all(),
            ]);
    }

    public function acpSave ( Request $request ) {
        $request->validate([
            'group' => 'required',
            'username' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
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
            'usepassword_confirmation'=> bcrypt( $request->password_confirmation),
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
