    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Knowledge base management</title>
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
            <li class="nav-item">
                <a class="nav-link active" href="/knowledgemanagement">Knowledge base management</a>
            </li>
        </ul>
        <br>
        <div class="text-center">
            <h4>Category Management</h4>
            <p>Here you can create new categories and edit and delete existing ones.</P>
        </div>
        <br>
        <button type="button" class="btn btn-success" @click="newCategory">Create new Category</button>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
        </table>
        @foreach($categories as $category)
        <div class="list-group-item list-group-item-action" aria-current="true">
            <a href="/category/{{$category->catKey}}">
                <div class="row">
                    <b class="col-md-2">{{$category->catKey}}</b>
                    <p class="col-md-5">{{$category->catName}}</p>
                    <p class="col-md-5">{{$category->catActive}}</p>
                </div>
            </a>
        </div>
        @endforeach
    </body>
    @endsection
