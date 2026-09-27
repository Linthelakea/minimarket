<!DOCTYPE html>
<html>
<head>
    <title>Data Users</title>
</head>
<body>

    <h1>Data Users</h1>

    @if(isset($users))

        @foreach($users as $user)
            <p>
                ID: {{ $user->id }} <br>
                Nama: {{ $user->name }} <br>
                Email: {{ $user->email }}
            </p>

            <hr>
        @endforeach

    @elseif(isset($user))

        <h3>Data User</h3>

        <p>ID: {{ $user->id }}</p>
        <p>Nama: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

    @endif

</body>
</html>