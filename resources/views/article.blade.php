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
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
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
