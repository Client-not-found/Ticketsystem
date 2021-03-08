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
        @foreach($categories as $category)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{$category->catName}}</th>
                </tr>
                <button type="button" class="btn btn-success" @click="newArticle">Create new ticket</button>
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
        </table>
        @endforeach
    </body>
    @endsection
