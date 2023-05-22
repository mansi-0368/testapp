<html>
    <head>
        <title>Create Visitor</title>
    </head>
    <body>
        <div class="container">
            <form method="POST" action="{{ route('visitor.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Enter Name">
                <input type="text" name="email" placeholder="Enter Email">
                <input type="text" name="phone" placeholder="Enter Phone">
                <input type="file" name="image" placeholder="Select Photo">
                <input type="text" name="age" placeholder="Enter Age">
                <button type="submit">Enter</button>
            </form>
        </div>
    </body>
</html>