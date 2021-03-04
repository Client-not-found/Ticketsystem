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
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                </tr>
            </tbody>
        </table>
        </div>
    </body>

    @endsection
