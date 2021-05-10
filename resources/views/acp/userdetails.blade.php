    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | New User</title>
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
        </ul>
        <br>
        <div class="text-center">
            <h4>Edit User</h4>
            <p>Here you can edit the user.</P>
        </div>
        <br>
        <div class="card col-md-6 offset-md-3">
            <div class="card-body">
                <form method="post" action="/edit">
                    @csrf
                    <input type="hidden" id="useKey" name="useKey" value="{{$user->useKey}}">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{$user->useUsername}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <br>
                    <div class="form-group col-md-12">
                        <label for="mail">Email</label>
                        <input type="email" class="form-control" id="mail" name="mail" value="{{$user->useMail}}" required>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{$user->useFirstname}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->useLastname}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="street">Street / Nr.</label>
                            <input type="text" class="form-control" id="street" name="street" value="{{$user->useStreet}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{$user->useState}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="zip">ZIP</label>
                            <input type="text" class="form-control" id="zip" name="zip" value="{{$user->useZIP}}" required>
                        </div>
                        <div class="col-md-8">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{$user->useCity}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="group">Permission Group</label>
                            <select class="form-control" id="group" name="group" required>
                                @foreach($groups as $group)
                                <option value="{{$group->groKey}}">{{$group->groName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <button type="submit" @click="edit" class="btn btn-outline-warning">Edit</button>
                        </div>
                    </div>
                </form>
                <form method="post" action="/delete">
                    @csrf
                    <input type="hidden" id="useKey" name="useKey" value="{{$user->useKey}}">
                    <div class="col-md-2">
                        <button type="submit" @click="acpDelete" class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
            </div>
            <br>
        </div>
        <br>
        <br>
    </body>
    @endsection
