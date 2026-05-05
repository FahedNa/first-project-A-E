<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about us</title>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>About Us </h1>
            <p class="subtitle">Your partners in the search for your dream home</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
        <div class="container">
            <div class="story-content"><div class="story-image">
                    <img src="https://images.unsplash.com/photo-1560520653-9e0e4c89eb11?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1073&q=80" alt="فريق العمل">
                </div>
                <div class="story-text">
                    <h2>Our story</h2>
                    <p>The real estate company was founded with the goal of transforming the concept of real estate marketing in our region. We started as a small team of real estate experts and developers who believed that technology could make buying and selling property more transparent and easier.

We will become one of the fastest-growing real estate platforms in the region, helping thousands of clients find their dream homes and ideal real estate investments.</p>
                </div>

            </div>
        </div>
    </section>


    <!-- Values Section -->
    <section class="values-section">
        <div class="container">
            <h2 class="section-title">Our values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="icon-wrapper">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3>Transparency</h3>
                    <p>We believe that transparency is the foundation of trust, so we provide all information clearly . </p>
                </div>
                <div class="value-card">
                    <div class="icon-wrapper">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Quality</h3>
                    <p> provide the highest levels of quality in our services and our carefully selected properties.</p>
                </div>
                <div class="value-card">
                    <div class="icon-wrapper">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Reliability</h3>
<p>We fulfill our promises through our commitment to professional standards.

</p>                </div>
                <div class="value-card">
                    <div class="icon-wrapper">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
<p>We use the latest technologies to provide a seamless and innovative property search experience.</p>                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Are you ready to find your dream property?</h2>
            <p>Our team is ready to assist you every step of the way.</p>
            <a href="{{ route('Property.all') }}" class="cta-button">Browse properties</a>
        </div>
    </section>
</body>
</html>
