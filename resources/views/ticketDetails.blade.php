    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Ticket Details</title>
    </header>

    <body>
        <br>
        <div class="container">
            <div class="row">
                @foreach($messages as $message)
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">Status</h6>
                            <p class="card-text">{{$ticket->ticStatus}}</p>
                            <h6 class="card-subtitle mb-2">Departement</h6>
                            <p class="card-text">{{$ticket->ticDepartement}}</p>
                            <h6 class="card-subtitle mb-2">Subject</h6>
                            <p class="card-text">{{$ticket->ticTopic}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form method="post" action="/tickets">
                        @csrf
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Add a new Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="ticId" name="ticId" value="{{ $ticket->ticKey}}">
                        </div>
                        <button type="submit" @click="save" class="btn btn-outline-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    @endsection
