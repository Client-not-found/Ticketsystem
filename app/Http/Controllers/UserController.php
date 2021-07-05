<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\Group;
use App\Models\User;
use App\Models\Page;

class UserController extends Controller
{
    public function admin() {
        $this->authorize('view', User::class);
        return view('acp.user',[
        'users' => User::all(),
        ]);
    }

    public function userDetails(Request $request, int $id)
    {
        $this->authorize('view', User::class);
        return view('acp.userdetails', [
            'user' => User::where( "useKey", $id )->first(),
            'groups' => Group::all(),
        ]);

    }

    public function newUser () {
        $this->authorize('create', User::class);
        return view('acp.newuser', [
            'groups' => Group::all(),
        ]);
    }


    public function acpEdit ( Request $request ) {
        $this->authorize('update', User::class);
        $request->validate([
            'group' => 'required',
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'mail' => 'required',
        ]);

        DB::table('users')
            ->where('useKey', '=', $request->useKey)
            ->update(['useGroId' => $request->group,
            'useUsername' => $request->username, 
            'usePassword' => bcrypt( $request->password ),
            'useFirstname' => $request->firstname,
            'useLastname' => $request->lastname,
            'useStreet' => $request->street,
            'useZIP' => $request->zip,
            'useCity' => $request->city,
            'useState' => $request->state,
            'useMail' => $request->mail]);

        return view('acp.user', [
            'users' => User::all(),
            ]);
    }

    public function acpDelete ( Request $request ) {

        $this->authorize('delete', User::class);
        DB::table('users')->where('useKey', '=', $request->useKey )->delete();

        return view('acp.user', [
            'users' => User::all(),
            ]);
    }

    public function acpSave ( Request $request ) {

        $this->authorize('create', User::class);
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

    public function save ( Request $request ) {

        $request->validate([
            //dd($request),
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
            'useGroId' => '3',
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

        return view('welcome', [
            'login' => Page::where( "pagName", 'Login' )->first(),
            ]);
    }

    public function register ( Request $request ) {
        return view('register', [
            'login' => Page::where( "pagName", 'Login' )->first(),
            ]);
    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

}
