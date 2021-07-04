    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Knowledge Base</title>
    </header>

    <body>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    <div class="text-center">
                        <h4>{{$article->artTopic}}</h4>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2">Username</h6>
                        <p class="card-text">{{$article->useUsername}}</p>
                        <h6 class="card-subtitle mb-2">Benutzergruppe</h6>
                        <p class="card-text">{{$article->groName}}</p>
                        <hr>
                        <form method="post" action="/deleteArticle">
                            @csrf
                            <input type="hidden" id="artKey" name="artKey" value="{{$article->artKey}}">
                            <div class="col-md-2">
                                @canany(['admin', 'employees'], App\Models\User::class)
                                <button type="submit" @click="artDelete" class="btn btn-outline-danger">Delete</button>
                                @endcanany
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{$article->artMessage}}</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @endsection
