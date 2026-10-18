<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Aura Estate | Modern Living</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Dependencies -->
    <link href="{{ asset('css/flexslider.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('css/elegant-icons.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('css/theme-1.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-deep: #1b3b35;
            --brand-primary: #2f6f64;
            --brand-light: #e8f2f0;
            --brand-sand: #fbf9f6;
            --text-main: #111827;
            --text-muted: #6b7280;
            --radius-xl: 24px;
            --radius-pill: 50px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: var(--brand-sand); color: var(--text-main); overflow-x: hidden; }

        /* Layout & Containers */
        .main-container, .bento-section, .panels-grid-section, .hero-top-bar { max-width: 1400px; margin-left: auto; margin-right: auto; padding-left: 40px; padding-right: 40px; }
        .hero-top-bar { margin-top: 30px; margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center; }
        .brand-logo img { max-height: 40px; }

        /* Logout Button */
        .btn-top-logout {
            background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; padding: 8px 20px;
            border-radius: var(--radius-pill); font-weight: 700; font-size: 0.9rem; cursor: pointer;
            display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; text-decoration: none;
        }
        .btn-top-logout:hover { background: #dc2626; color: white; border-color: #dc2626; transform: translateY(-2px); }

        /* Hero Slider */
        .hero-slider { border-radius: var(--radius-xl); overflow: hidden; box-shadow: 0 30px 60px rgba(27, 59, 53, 0.18); position: relative; }
        .hero-slider .slides li { height: 600px !important; position: relative; }
        .hero-slider .overlay::after { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, rgba(27, 59, 53, 0.85) 0%, rgba(17, 24, 39, 0.4) 100%); }
        .slider-content-wrap { position: relative; z-index: 10; max-width: 700px; padding-top: 40px; }
        .slider-badge { display: inline-block; background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); color: #fff; padding: 6px 16px; border-radius: 30px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 20px; border: 1px solid rgba(255, 255, 255, 0.2); }
        .slider-title { font-size: 3.2rem; font-weight: 800; color: #fff; line-height: 1.15; margin-bottom: 25px; text-shadow: 0 2px 10px rgba(0,0,0,0.3); }
        .slider-btn-explore { display: inline-flex; align-items: center; gap: 10px; background: #fff; color: var(--brand-deep); padding: 14px 30px; border-radius: var(--radius-pill); font-weight: 700; text-decoration: none; transition: 0.3s; box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
        .slider-btn-explore:hover { background: var(--brand-primary); color: #fff; transform: translateY(-2px); }

        /* Section Headings */
        .section-heading { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; }
        .section-heading h2 { font-size: 2.5rem; font-weight: 800; color: var(--brand-deep); }

        /* Bento Grid */
        .bento-section { margin: 80px auto; }
        .bento-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
        .bento-card { background: white; border-radius: var(--radius-xl); overflow: hidden; border: 1px solid rgba(0,0,0,0.04); box-shadow: 0 10px 30px rgba(0,0,0,0.03); transition: 0.4s; }
        .bento-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(47, 111, 100, 0.12); }
        .bento-img { height: 260px; overflow: hidden; }
        .bento-img img { width: 100%; height: 100%; object-fit: cover; transition: 0.6s; }
        .bento-card:hover .bento-img img { transform: scale(1.06); }
        .bento-body { padding: 30px; }
        .bento-body a { display: inline-flex; align-items: center; gap: 10px; color: var(--brand-primary); font-weight: 700; text-decoration: none; font-size: 1.05rem; transition: 0.3s; }
        .bento-card:hover .bento-body a { gap: 15px; color: var(--brand-deep); }

        /* Panels Grid */
        .panels-grid-section { margin: 80px auto; }
        .panels-container { display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; }
        .new-modern-box { background: #fff; border-radius: var(--radius-xl); padding: 35px; position: relative; border: 1px solid rgba(47, 111, 100, 0.1); box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: 0.4s; display: flex; flex-direction: column; justify-content: space-between; overflow: hidden; }
        .new-modern-box::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--brand-primary); transform: scaleX(0); transform-origin: left; transition: 0.4s; }
        .new-modern-box:hover { transform: translateY(-6px); border-color: var(--brand-primary); box-shadow: 0 20px 40px rgba(47, 111, 100, 0.1); }
        .new-modern-box:hover::before { transform: scaleX(1); }

        .box-header-flex { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; }
        .box-icon-circle { width: 54px; height: 54px; border-radius: 16px; background: var(--brand-light); color: var(--brand-primary); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; transition: 0.3s; }
        .new-modern-box:hover .box-icon-circle { background: var(--brand-primary); color: #fff; transform: scale(1.05); }
        .box-tag { font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); background: #f3f4f6; padding: 4px 10px; border-radius: 20px; }
        .new-modern-box h3 { font-size: 1.35rem; font-weight: 800; color: var(--brand-deep); margin-bottom: 12px; }
        .new-modern-box p { color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px; }
        .box-link-arrow { display: inline-flex; align-items: center; gap: 8px; color: var(--brand-primary); font-weight: 700; font-size: 0.95rem; text-decoration: none; transition: 0.3s; }
        .new-modern-box:hover .box-link-arrow { gap: 14px; color: var(--brand-deep); }

        /* Dark Special Box Variation */
        .new-modern-box.dark-special { background: var(--brand-deep); border: none; }
        .new-modern-box.dark-special::before { background: #34d399; }
        .new-modern-box.dark-special .box-icon-circle { background: rgba(255, 255, 255, 0.1); color: #34d399; }
        .new-modern-box.dark-special .box-tag { background: rgba(255, 255, 255, 0.1); color: #d1d5db; }
        .new-modern-box.dark-special h3 { color: #fff; }
        .new-modern-box.dark-special p { color: #d1d5db; }
        .new-modern-box.dark-special .box-link-arrow { color: #34d399; }
        .new-modern-box.dark-special:hover .box-link-arrow { color: #fff; }

        /* Footer */
        .global-footer-new { background: linear-gradient(135deg, #0b1329 0%, #111827 100%); color: #9ca3af; padding: 90px 40px 30px; margin-top: 100px; border-top-left-radius: 40px; border-top-right-radius: 40px; }
        .footer-new-container { max-width: 1400px; margin: 0 auto; display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.2fr; gap: 40px; }
        .footer-new-col h4 { color: #fff; font-size: 1.1rem; font-weight: 700; margin-bottom: 25px; position: relative; }
        .footer-new-col h4::after { content: ''; position: absolute; left: 0; bottom: -8px; width: 30px; height: 2px; background: var(--brand-primary); }
        .footer-new-col p { line-height: 1.8; font-size: 0.92rem; color: #9ca3af; margin-bottom: 20px; }
        .footer-links-list { list-style: none; padding: 0; display: flex; flex-direction: column; gap: 12px; }
        .footer-links-list a { color: #9ca3af; text-decoration: none; font-size: 0.95rem; transition: 0.3s; display: inline-flex; align-items: center; gap: 8px; }
        .footer-links-list a:hover { color: #fff; transform: translateX(5px); }
        .footer-links-list a i { font-size: 0.75rem; color: var(--brand-primary); }
        .footer-social-box { display: flex; gap: 10px; margin-top: 20px; }
        .footer-social-box a { display: flex; align-items: center; justify-content: center; width: 42px; height: 42px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); color: #fff; border-radius: 12px; transition: 0.3s; text-decoration: none; }
        .footer-social-box a:hover { background: var(--brand-primary); border-color: var(--brand-primary); transform: translateY(-3px); }
        .footer-contact-item { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 15px; font-size: 0.95rem; color: #9ca3af; }
        .footer-contact-item i { color: var(--brand-primary); margin-top: 4px; }
        .footer-bottom-flex { max-width: 1400px; margin: 60px auto 0; padding-top: 25px; border-top: 1px solid rgba(255, 255, 255, 0.08); display: flex; justify-content: space-between; align-items: center; font-size: 0.9rem; color: #6b7280; }

        /* Responsive */
        @media (max-width: 1024px) {
            .bento-grid, .panels-container, .footer-new-container { grid-template-columns: 1fr; }
            .hero-top-bar { flex-direction: column; gap: 15px; text-align: center; }
            .slider-title { font-size: 2.2rem; }
            .footer-bottom-flex { flex-direction: column; gap: 15px; text-align: center; }
        }

    </style>
</head>

{{-- notification --}}

<!-- Welcome Notification -->
<div id="welcomeToast"
     style="
        position: fixed;
        top: 20px;
        right: 20px;
        background: #2f6f64;
        color: white;
        padding: 16px 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px #0002;
        z-index: 99999;
        display: none;
        max-width: 320px;
     ">
    <button onclick="closeWelcomeToast()"
            style="float:right; background:none; border:none;
                   color:white; font-size:20px; cursor:pointer;">
        &times;
    </button>

    <strong>🏡 رسالة لك</strong>
    <div id="welcomeMessage" style="margin-top:8px;"></div>
</div>

<script>
    const welcomeMessages = [
        "اختيارك الان هام بلنسبة لك 🏡",
        "اكتشف عقارك الجديد اليوم 🔑",
        "بيت أحلامك صار أقرب! 🏠",
        "تصفّح أحدث العقارات المضافة ✨",
        "يمكنك العثور على منزلك المثالي معنا ❤️",
        "لا تفوّت فرصة اكتشاف عقاراتنا الجديدة!"
    ];

    function showWelcomeToast() {
        const randomIndex = Math.floor(
            Math.random() * welcomeMessages.length
        );

        document.getElementById('welcomeMessage').textContent =
            welcomeMessages[randomIndex];

        const toast = document.getElementById('welcomeToast');
        toast.style.display = 'block';

        setTimeout(() => {
            toast.style.display = 'none';
        }, 5000);
    }

    function closeWelcomeToast() {
        document.getElementById('welcomeToast').style.display = 'none';
    }

    window.addEventListener('load', showWelcomeToast);
</script>
</body>

<body>

    <!-- Top Bar -->
    <header class="hero-top-bar">
        <a href="{{ route('contact') }}" class="brand-logo">
            <img src="{{ asset('img/logo-dark.png') }}" alt="Logo">
        </a>

          <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-top-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
    </header>

    <!-- Main Container & Slider -->
    <div class="main-container">
        <section class="hero-slider">
            <ul class="slides">
                <li class="overlay">
                    <div class="background-image-holder parallax-background">
                        <img class="background-image" alt="Background" src="{{ asset('uploads/properties/1767179604_Villa2.jpg') }}">
                    </div>
                    <div class="container align-vertical">
                        <div class="slider-content-wrap">
                            <span class="slider-badge"><i class="fas fa-star" style="color: #fbbf24;"></i> Featured Luxury Estate</span>
                            <h1 class="slider-title">Discover Your Dream Luxury Property Today.</h1>
                            <a href="{{ route('Property.all') }}" class="slider-btn-explore">Explore All Properties <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="overlay">
                    <div class="background-image-holder parallax-background">
                        <img class="background-image" alt="Background" src="{{ asset('uploads/properties/1767179813_Villa1.jpg') }}">
                    </div>
                    <div class="container align-vertical">
                        <div class="slider-content-wrap">
                            <span class="slider-badge"><i class="fas fa-shield-alt" style="color: #34d399;"></i> Verified Agents</span>
                            <h1 class="slider-title">Find the Perfect Home with Trusted Professionals.</h1>
                            <a href="{{ route('Property.all') }}" class="slider-btn-explore">Explore All Properties <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="overlay">
                    <div class="background-image-holder parallax-background">
                        <img class="background-image" alt="Background" src="{{ asset('uploads/properties/1767179436_home1.jpg') }}">
                    </div>
                    <div class="container align-vertical">
                        <div class="slider-content-wrap">
                            <span class="slider-badge"><i class="fas fa-award" style="color: #60a5fa;"></i> Prime Investments</span>
                            <h1 class="slider-title">Excellence and Quality in Real Estate Investments.</h1>
                            <a href="{{ route('Property.all') }}" class="slider-btn-explore">Explore All Properties <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
    </div>

    <!-- Bento Grid Showcase -->
    <section class="bento-section">
        <div class="section-heading">
            <div>
                <span style="color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; font-size: 0.8rem;">Portfolio</span>
                <h2>Featured Collections</h2>
            </div>
        </div>
        <div class="bento-grid">
            <div class="bento-card">
                <div class="bento-img"><img src="{{ asset('uploads/properties/1767176229_shop.jpg') }}" alt="Commercial"></div>
                <div class="bento-body">
                    <h4 style="font-weight: 700; margin-bottom: 12px; color: var(--brand-deep);">Commercial Spaces</h4>
                    <a href="{{ route('Property.all') }}">Explore All Properties<i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="bento-card">
                <div class="bento-img"><img src="{{ asset('uploads/properties/1767178944_home.jpg') }}" alt="Residential"></div>
                <div class="bento-body">
                    <h4 style="font-weight: 700; margin-bottom: 12px; color: var(--brand-deep);">Residential Villas</h4>
                    <a href="{{ route('Property.all') }}">Explore All Properties <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="bento-card">
                <div class="bento-img"><img src="{{ asset('uploads/properties/slider1.jpg') }}" alt="Exclusive"></div>
                <div class="bento-body">
                    <h4 style="font-weight: 700; margin-bottom: 12px; color: var(--brand-deep);">Exclusive Estates</h4>
                    <a href="{{ route('Property.all') }}">Explore All Properties <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

<!-- Map Button -->
<center>
    <a href="{{ route('offers.map') }}" class="map-button">
        <span class="map-pin" style="font-size: 30px">📍</span>
        <span class="map-content">
            <strong style="font-size: 30px">search on map</strong>
        </span>
        <span class="map-arrow">←</span>
    </a></center>
    <!-- Panels Grid (6 Boxes) -->
    <section class="panels-grid-section">
        <div class="section-heading">
            <div>
                <span style="color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; font-size: 0.8rem;">Platform Hubs</span>
                <h2>Explore System Sections</h2>
            </div>
        </div>
        <div class="panels-container">
            <div class="new-modern-box">
                <div>
                    <div class="box-header-flex"><div class="box-icon-circle"><i class="fas fa-file-contract"></i></div><span class="box-tag">Legal</span></div>
                    <h3>Policies & Agreement</h3>
                    <p>Review our comprehensive transparency, security guidelines, and real estate user terms.</p>
                </div>
                <a href="{{ route('policies.agreement') }}" class="box-link-arrow">Read Policy <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="new-modern-box dark-special">
                <div>
                    <div class="box-header-flex"><div class="box-icon-circle"><i class="fas fa-robot"></i></div><span class="box-tag">AI Support</span></div>
                    <h3>AI Assistant ChatBot</h3>
                    <p>Interact instantly with our intelligent real estate chatbot to answer all inquiries.</p>
                </div>
                <a href="{{ route('chatbot') }}" class="box-link-arrow">Start Chat <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="new-modern-box">
                <div>
                    <div class="box-header-flex"><div class="box-icon-circle"><i class="fas fa-info-circle"></i></div><span class="box-tag">Company</span></div>
                    <h3>About Our Platform</h3>
                    <p>Learn more about our vision, our expert team, and our commitment to excellence.</p>
                </div>
                <a href="{{ route('about') }}" class="box-link-arrow">Discover More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="new-modern-box dark-special">
                <div>
                    <div class="box-header-flex"><div class="box-icon-circle"><i class="fas fa-envelope"></i></div><span class="box-tag">Help Desk</span></div>
                    <h3>Direct Contact Us</h3>
                    <p>Get in touch with our administrative and customer care desk anytime.</p>
                </div>
                <a href="{{ route('contactt') }}" class="box-link-arrow">Get in Touch <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="new-modern-box">
                <div>
                    <div class="box-header-flex"><div class="box-icon-circle"><i class="fas fa-headset"></i></div><span class="box-tag">Priority</span></div>
                    <h3>Complaints & Support</h3>
                    <p>Have an issue? Submit your feedback or complaints for rapid resolution.</p>
                </div>
                <a href="{{ route('complaint') }}" class="box-link-arrow">Add Complaint <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="new-modern-box dark-special">
                <div>
                    <div class="box-header-flex"><div class="box-icon-circle"><i class="fas fa-building"></i></div><span class="box-tag">Network</span></div>
                    <h3>Partner Offices</h3>
                    <p>Browse our certified network of regional real estate offices and agents.</p>
                </div>
                <a href="{{ route('front.offices.index') }}" class="box-link-arrow">View Offices <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="global-footer-new">
        <div class="footer-new-container">
            <div class="footer-new-col">
                <img src="{{ asset('img/logo-dark.png') }}" alt="Logo" style="max-height: 40px; filter: brightness(0) invert(1); margin-bottom: 20px;">
                <p>Providing premier real estate solutions, connecting clients with verified dream homes through expert agency networks.</p>
                <div class="footer-social-box">
                    <a href="#" aria-label="Twitter"><i class="icon social_twitter"></i></a>
                    <a href="#" aria-label="Facebook"><i class="icon social_facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="icon social_instagram"></i></a>
                </div>
            </div>
            <div class="footer-new-col">
                <h4>Quick Links</h4>
                <ul class="footer-links-list">
                    <li><a href="{{ route('Property.all') }}"><i class="fas fa-chevron-right"></i> All Properties</a></li>
                    <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                    <li><a href="{{ route('front.offices.index') }}"><i class="fas fa-chevron-right"></i> Partner Offices</a></li>
                </ul>
            </div>
            <div class="footer-new-col">
                <h4>Support & Legal</h4>
                <ul class="footer-links-list">
                    <li><a href="{{ route('contactt') }}"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                    <li><a href="{{ route('complaint') }}"><i class="fas fa-chevron-right"></i> Complaints & Support</a></li>
                    <li><a href="{{ route('policies.agreement') }}"><i class="fas fa-chevron-right"></i> Policies & Agreement</a></li>
                </ul>
            </div>
            <div class="footer-new-col">
                <h4>Get in Touch</h4>
                <div class="footer-contact-item"><i class="fas fa-envelope"></i><span>contact@realestate.com</span></div>
                <div class="footer-contact-item"><i class="fas fa-phone-alt"></i><span>+70 424 495 952</span></div>
            </div>
        </div>
        <div class="footer-bottom-flex">
            <p>© 2026 Fahed Naji & Baraa Mojahed - All Rights Reserved</p>
            <p>Aura Estate Modern Living Platform</p>
        </div>
    </footer>

    <!-- JS Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('js/scrollReveal.min.js') }}"></script>
    <script src="{{ asset('js/isotope.min.js') }}"></script>
    <script src="{{ asset('js/twitterFetcher_v10_min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
