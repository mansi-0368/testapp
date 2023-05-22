<html>
    <head>
        <title>Create Visitor</title>
    </head>
    <body>
        <div class="container">
            <table><tr>
                <td>Sr. no.</td>
                <td>Name</td>
                <td>Age</td>
                <td>Email</td>
                <td>Phone</td>
                </tr>
                @foreach($visitors as $visitor)
                <tr>
                   
                    <td>{{$visitor->id}}</td>
                    <td>{{$visitor->name}}</td>
                    <td>{{$visitor->age}}</td>
                    <td>{{$visitor->email}}</td>
                    <td>{{$visitor->phone}}</td>
                   
                </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>