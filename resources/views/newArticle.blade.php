    @extends('layout.app')

    @section('content')
    <header>
        <title>Ticketsystem | Dashboard</title>
    </header>

    <body>
        <div class="card">
            <div class="card-body">
                <form method="post" action="/knowledgebase">
                    @csrf
                    <div>
                        <input type="hidden" id="user" name="user" value="{{auth()->user()->useKey}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category">Category</label>
                        <select id="category" name="category" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{$category->catKey}}">{{$category->catName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="message">Text</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Create new article"></textarea>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" @click="save" class="btn btn-outline-success">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    @endsection
