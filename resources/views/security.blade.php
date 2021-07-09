    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Profile</title>
    </header>
    <body>
        <div class="container">
            <br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/profile/{{auth()->user()->key}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/security">Security</a>
                </li>
            </ul>
            <br>
            <div class="text-center">
                <h4>Security Settings</h4>
                <p>Here you can make changes to your security settings.</p>
            </div>
            <br>
            <div class="card col-md-6 offset-md-3">
                <div class="card-body">
                </div>
            </div>
        </div>
        @endsection
