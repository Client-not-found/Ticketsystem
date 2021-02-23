    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Dashboard</title>
    </header>

    <body>
        <div class="container">
            <div class="text-center">
                <br>
                <h3>Dashboard</h3>
                <p>Welcome to the Dashboard</p>
            </div>
            <br>
            <!-- Statistik -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-white bg-success">
                            <h5 class="card-title">Tickets Open</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-white bg-danger">
                            <h5 class="card-title">Tickets Closed</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-white bg-primary">
                            <h5 class="card-title">Tickets total</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- Offene Tickets -->
            <h4>Open tickets </h4>
            <table class="table">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col" class="col-md-2">ID</th>
                        <th scope="col" class="col-md-5">Departement</th>
                        <th scope="col" class="col-md-5">Subject</th>
                    </tr>
                </thead>
            </table>
            @foreach($openTickets as $ticket)
            <div class="list-group-item list-group-item-action" aria-current="true">
                <a href="#" @onClick="ticketDetail ( {{$ticket->ticId}} )">
                    <div class="row">
                        <b class="col-md-2">{{$ticket->ticId}}</b>
                        <p class="col-md-5">{{$ticket->ticDepartement}}</p>
                        <p class="col-md-5">{{$ticket->ticSubject}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </body>
    @endsection