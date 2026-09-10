<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f1f5f9;
        }

        .login-container {
            width: 380px;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .login-container p {
            text-align: center;
            color: #64748b;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #2563eb;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 7px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <h2>Login</h2>
        <p>Silakan masuk ke akun Anda</p>

        @if (session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST">

            @csrf

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit">
                Login
            </button>

        </form>

    </div>

</body>
</html>