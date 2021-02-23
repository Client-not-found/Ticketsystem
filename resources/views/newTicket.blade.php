    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Create Ticket</title>
    </header>

    <body>
        <br>
        <div class="text-center">
            <h4>Create Ticket</h4>
            <p>To create a new ticket please fill out the form below</p>
        </div>
        <div>
            <div class="card">
                <div class="card-body">
                    @csrf
                    <form method="get" action="/tickets">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="A brief, pithy description of your request" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="departement">Departement</label>
                            <select class="form-control" id="departement" name="departement" required>
                                <option value="1">General Support</option>
                                <option value="2">Technical Support</option>
                                <option value="3">Feedback</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Please describe your request here" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    @endsection
