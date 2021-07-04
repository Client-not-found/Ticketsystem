    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | User management</title>
    </header>

    <body>
        <br>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/acp">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/usermanagement">User management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/knowledgemanagement">Knowledge base management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/settings">Settings</a>
            </li>
        </ul>
        <br>
        <div class="text-center">
            <h4>User Management</h4>
            <p>Here you can create new users and edit and delete existing ones.</P>
        </div>
        <br>
        <button type="button" class="btn btn-success" @click="newUser">Create new user</button>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                </tr>
            </thead>
        </table>
        @foreach($users as $user)
        <div class="list-group-item list-group-item-action" aria-current="true">
            <a href="/user/{{$user->useKey}}">
                <div class="row">
                    <b class="col-md-2">{{$user->useKey}}</b>
                    <p class="col-md-5">{{$user->useFirstname}}</p>
                    <p class="col-md-5">{{$user->useLastname}}</p>
                </div>
            </a>
        </div>
        @endforeach

    </body>

    @endsection
