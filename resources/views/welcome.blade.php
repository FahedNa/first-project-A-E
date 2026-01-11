<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Real Estate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/styleWelcome.css') }}">

    </head>
    <body>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-10 mx-auto text-center hero-content">


                        <h1 class="hero-title">Discover Luxury Living and choose the dream house </h1>

                        <p class="hero-subtitle">
                            Your gateway to exclusive real estate opportunities. Explore premium properties,
                            connect with expert agents, and find your dream home in today's competitive market.
                        </p>

                        <div class="auth-buttons justify-content-center">
                            <a href="{{ route('login') }}" class="btn btn-login btn-auth">
                                <i class="fas fa-sign-in-alt"></i>
                                Log In
                            </a>

                            <a href="{{ route('register') }}" class="btn btn-register btn-auth">
                                <i class="fas fa-user-plus"></i>
                                Create Free Account
                            </a>
                        </div>


                </div>
            </div>
        </section>
    </body>
</html>
