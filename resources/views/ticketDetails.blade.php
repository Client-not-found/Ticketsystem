    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Ticket Details</title>
    </header>

    <body>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">Status</h6>
                            <p class="card-text">{{$ticket->ticStatus}}</p>
                            <h6 class="card-subtitle mb-2">Departement</h6>
                            <p class="card-text">{{$ticket->ticDepartement}}</p>
                            <h6 class="card-subtitle mb-2">Subject</h6>
                            <p class="card-text">{{$ticket->ticSubject}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Add a new Message"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    @endsection
