<!DOCTYPE html>
<html>
<head>
    <title>Validasi Laravel</title>
</head>
<body>

    <h2>Form Validasi</h2>

    {{-- Menampilkan pesan error --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/validasi" method="POST">
        @csrf

        <div>
            <label>Nama:</label>
            <input type="text" name="name">
        </div>

        <br>

        <div>
            <label>Email:</label>
            <input type="text" name="email">
        </div>

        <br>

        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>

        <br>

        <div>
            <label>Konfirmasi Password:</label>
            <input type="password" name="password_confirmation">
        </div>

        <br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>