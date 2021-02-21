@extends('layout.app')

@section('content')
<header>
    <title>Ticketsystem | Dashboard</title>
</header>
<body>
    <br>
    <h4>Ticketliste</h4>
    <div class="col-md-12">
        <table class="table">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col" class="col-md-2">ID</th>
                    <th scope="col" class="col-md-4">Betreff</th>
                    <th scope="col" class="col-md-6">Abteilung</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <th scope="row">{{ $ticket->id }}</th>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->departement }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
