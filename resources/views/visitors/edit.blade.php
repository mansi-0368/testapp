<html>
    <head>
        <title>Create Visitor</title>
    </head>
    <body>
        <div class="container">
            <form method="POST" action="{{ route('visitor.update', $visitor[0]->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" value="{{ $visitor[0]->name }}">
                <input type="text" name="email" value="{{ $visitor[0]->email }}">
                <input type="text" name="phone" value="{{ $visitor[0]->phone }}">
                <input type="file" name="image" value="{{ $visitor[0]->image }}">
                <input type="text" name="age" value="{{ $visitor[0]->age }}">
                <button type="submit">Update</button>
            </form>
        </div>
    </body>
</html>