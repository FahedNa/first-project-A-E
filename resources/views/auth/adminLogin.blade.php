<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="container">

    <!-- Left Section -->
    <div class="left">
        <div class="overlay">
            <h1>Welcome Back</h1>
            <p>Access your property portfolio and manage your listings with ease.</p>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right">
        <div class="form-box">
            <h2>EstateHub</h2>
            <h3>Sign In</h3>
            <p class="subtitle">Enter your credentials to access your account</p>


{{--  --}}



            {{-- Laravel Login Form --}}
            <form method="POST" action="{{ route('save.admin.login') }}">
                @csrf

                <label>Email Address</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                >

                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    required
                >

                <div class="options">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>

                <button type="submit">Sign In</button>
            </form>

            <p class="register">
                Don't have an account?
                <a href="{{ route('register') }}">Create one</a>
            </p>
        </div>
    </div>

</div>

</body>
</html>
