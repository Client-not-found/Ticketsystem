    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Knowledge Base</title>
    </header>

    <body>
        <div class="text-center">
            <br>
            <h3>Knowledge Base</h3>
            <p>Welcome to the knowledge base. Here you will find help articles on frequently asked topics.</p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                </tr>
            </thead>
            @foreach($categories as $category)
            @foreach($articles as $article)
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
            @endforeach
            @endforeach
        </table>
    </body>
    @endsection
