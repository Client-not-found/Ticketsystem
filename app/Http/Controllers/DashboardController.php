<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class DashboardController extends Controller

{

    public function acp () {
        $this->authorize('view', User::class);
        return view('acp.dashboard');
    }

} ?>