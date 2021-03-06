<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/home">Ticketsystem</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tickets">Tickets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/knowledgebase">Knowledge Base</a>
                </li>
                @can('view', App\User::class)
                <li class="nav-item">
                    <a class="nav-link" href="/acp">ACP</a>
                </li>
                @endcan
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/profile/{{auth()->user()->key}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" id="app">@yield('content') </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

<footer class="footer col-md-12">
    <nav class=" navbar-dark bg-dark text-white">
        <p class="text-center">(c)-2021 Nicolas Rhyner | Ticketsystem </p>
    </nav>
</footer>

</html>
