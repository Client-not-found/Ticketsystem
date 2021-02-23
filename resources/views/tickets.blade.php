@extends('layout.app')

@section('content')
<header>
    <title>Ticketsystem | Dashboard</title>
</header>
<body>
    <br>
    <div class="text-center">
        <h3>Ticket list</h3>
        <p>Here you can see your ticket history</p>
    </div>
    <div class="col-md-12">
        <button type="button" class="btn btn-success" @click="newTicket">Create new ticket</button>
        <table class="table">
            <br>
            <br>
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col" class="col-md-2">ID</th>
                    <th scope="col" class="col-md-4">Subject</th>
                    <th scope="col" class="col-md-6">Department</th>
                    <th scope="col" class="col-md-6">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <th class="col-md-3">{{ $ticket->ticId }}</th>
                    <td class="col-md-3">{{ $ticket->ticSubject }}</td>
                    <td class="col-md-3">{{ $ticket->ticDepartement }}</td>
                    <td class="col-md-3">{{ $ticket->ticStatus }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
