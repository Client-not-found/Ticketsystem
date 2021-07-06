<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;

class SettingController extends Controller
{

    public function acpSettings () {
        $this->authorize('viewAny', Page::class);
        return view('acp.settings', [
            'login' => Page::where( "name", 'Login' )->first(),
        ]);
    }

    public function save ( Request $request ) {
        //dd($request);
        $this->authorize('update', Page::class);

        $request->validate([
            'status' => 'required',
        ]);

        DB::table('pages')
            ->where('key', '=', $request->id)
            ->update(['status' => $request->status]);

        return view('acp.settings', [
            'login' => Page::where( "name", 'Login' )->first(),
        ]);
    }

    public function login () {
        return view('welcome', [
            'login' => Page::where( "name", 'Login' )->first(),
        ]);
    }
}
