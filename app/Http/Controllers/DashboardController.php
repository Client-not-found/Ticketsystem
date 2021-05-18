<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class DashboardController extends Controller

{

    public function acp () {
        $this->authorize('admin', User::class);
        return view('acp.dashboard');
    }

} ?>