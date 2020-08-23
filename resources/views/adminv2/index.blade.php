
<html>
    <body>
        <h1>Hello Admins</h1>

        @foreach ($admins as $admin)
             {{ $admin->username }}
        @endforeach
    </body>
</html>
