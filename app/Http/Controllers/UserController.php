<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class UserController extends Controller
{
    public function login ( Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        return view('dashboard',[
            'tickets' => Ticket::all(),
            'countTickets' => Ticket::count(),

            'openTickets' => Ticket::where("ticStatus", "Open")->get(),
            'countOpenTickets' => Ticket::where("ticStatus", "Open")->count(),

            'closeTickets' => Ticket::where("ticStatus", "Close")->get(),
            'countClosedTickets' => Ticket::where("ticStatus", "Close")->count()
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
            'user' => User::where( "useKey", $id )->first()
        ]);

    }

    public function newUser () {
        return view('acp.newuser');
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
            'usePassword' => $request->password,
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
