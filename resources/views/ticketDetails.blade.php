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
                        <h5 class="card-header">{{$message->user->useFirstname}} {{$message->user->useLastname}}</h5>
                        <div class="card-body">
                            <p class="card-text">{{$message->mesMessage}}</p>
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
                            <p class="card-text">{{$ticket->departement->depName}}</p>
                            <h6 class="card-subtitle mb-2">Subject</h6>
                            <p class="card-text">{{$ticket->ticSubject}}</p>
                            <hr>
                            <p class="card-subtitle mb-2"> Manage Ticket </p>
                            @if ($ticket->ticStatus === 'Open')
                            <form method="post" action="/tickets">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" id="status" name="status" value="Close">
                                    <input type="hidden" id="ticId" name="ticId" value="{{$ticket->ticKey}}">
                                </div>
                                <button type="submit" class="btn btn-warning" @click="newStatus">Close Ticket</button>
                            </form>
                            @else
                            <form method="post" action="/tickets">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" id="status" name="status" value="Open">
                                    <input type="hidden" id="ticId" name="ticId" value="{{$ticket->ticKey}}">
                                </div>
                                <button type="submit" class="btn btn-success" @click="newStatus">Open Ticket</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @if ($ticket->ticStatus === 'Open')
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="/tickets">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label for="user">User</label>
                                    <select class="form-control" id="user" name="user">
                                        @foreach($users as $user)
                                        <option value="{{$user->useKey}}">{{$user->useUsername}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Add a new Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="ticId" name="ticId" value="{{ $ticket->ticKey}}">
                                </div>
                                <br>
                                <button type="submit" @click="save" class="btn btn-outline-success">Submit</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-info" role="alert">
                        <p>The ticket is closed, you can no longer reply to it. If you want to add a reply open the ticket again.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
    @endsection
