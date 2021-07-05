    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Settings</title>
    </header>

    <body>
        <br>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/acp">Dashboard</a>
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
            <li class="nav-item active">
                <a class="nav-link" href="/settings">Settings</a>
            </li>
            @endcan
        </ul>
        <br>
        <div class="text-center">
            <h4>Settings</h4>
            <p>Here you can manage additional settings.</P>
        </div>
        <br>
        <h4>Pages</h4>
        <hr>
        <p>Users can register themselves</p>
        @if($login->pagStatus == false)
        <form method="post" action="/settingsEdit">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$login->pagKey}}">
            <button type="submit" class="btn btn-success" name="status" id="status" value="1">Enable</button>
        </form>
        @elseif($login->pagStatus == true)
        <form method="post" action="/settingsEdit">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$login->pagKey}}">
            <button type="submit" class="btn btn-danger" name="status" id="status" value="0">Disable</button>
        </form>
        @endif
    </body>
    @endsection
