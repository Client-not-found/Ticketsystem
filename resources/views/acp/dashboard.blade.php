    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | ACP</title>
    </header>

    <body>
        <br>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="/acp">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/usermanagement">User management</a>
            </li>
            @can('create', App\Category::class)
            <li class="nav-item">
                <a class="nav-link" href="/knowledgemanagement">Knowledge base management</a>
            </li>
            @endcan
            @can('create', App\Page::class)
            <li class="nav-item">
                <a class="nav-link" href="/settings">Settings</a>
            </li>
            @endcan
        </ul>
        <br>
        <div class="text-center">
            <h4>Admin Control Panel</h4>
            <p>Welcome to the ACP here you can manage the ticketsystem</P>
        </div>
        <br>
        <h4>Software</h4>
        <hr>
        <b>Ticketsystem Version:</b>
        <p>2.5</p>
        <br>
        <b>Software developed by: </b>
        <p>Nicolas Rhyner</p>
        <br>
        <p>Copyright 2021. All rights reserved.</p>

    </body>

    @endsection
