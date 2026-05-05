<!DOCTYPE html>
<html class="no-js" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Complaint</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSS Files -->
        <link href="{{ asset('css/flexslider.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ asset('css/line-icons.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ asset('css/elegant-icons.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ asset('css/lightbox.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ asset('css/theme-1.css')}}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css" media="all"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('css/complaint.css') }}">

    </head>

    <body>
        <!-- Success Message -->
        <div id="successAlert" class="success-message">
            <i class="fas fa-check-circle"></i>
            <span>Your complaint has been sent successfully! Thank you for contacting us</span>
        </div>

        <div class="page-container">
            <!-- Back Button -->
            <div class="back-nav">
                {{-- contact==landingpage --}}
                <a href="{{ route('contact') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>

            <!-- Form Card -->
            <div class="complaint-card">
                <div class="card-header">
                    <h1>Submit a Complaint or Suggestion</h1>
                    <p>We are here to help you - Our team will respond as soon as possible</p>
                </div>

                <div class="card-body">
                    <form class="complaint-form" method="POST" action="{{ route('complaints.store') }}" id="contactForm">
                        @csrf

                        <!-- Full Name -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user"></i>
                                Full Name
                            </label>
                            <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                   id="user_name" name="user_name" value="{{ old('user_name') }}"
                                   required placeholder="Enter your full name">
                            <i class="fas fa-user input-icon"></i>
                            @error('user_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-envelope"></i>
                                Email Address
                            </label>
                            <input type="email" class="form-control @error('user_email') is-invalid @enderror"
                                   id="user_email" name="user_email" value="{{ old('user_email') }}"
                                   required placeholder="Enter your email address">
                            <i class="fas fa-envelope input-icon"></i>
                            @error('user_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Complaint Title -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-heading"></i>
                                Complaint Title
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title') }}"
                                   required placeholder="Brief summary of your complaint">
                            <i class="fas fa-tag input-icon"></i>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Complaint Details -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-comment-dots"></i>
                                Complaint Details
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description"
                                      placeholder="Write your complaint details here..."
                                      rows="3" required>{{ old('description') }}</textarea>
                            <i class="fas fa-pencil-alt input-icon" style="top: 33px;"></i>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="submit-btn" id="submitBtn">
                            <span>Submit Complaint</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>

                        <!-- Success and Error Messages -->
                        <div class="form-success">
                            <i class="fas fa-check-circle"></i>
                            <span>Complaint sent successfully</span>
                        </div>
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>Please fill in all fields</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script>
            (function() {
                'use strict';

                // Page elements

                const form = document.getElementById('contactForm');
                const submitBtn = document.getElementById('submitBtn');
                const successAlert = document.getElementById('successAlert');
                const formError = document.querySelector('.form-error');

                // Form validation
                function validateForm() {
                    let isValid = true;
                    const inputs = form.querySelectorAll('input[required], textarea[required]');

                    inputs.forEach(input => {
                        if (!input.value.trim()) {
                            isValid = false;
                            input.classList.add('is-invalid');
                        } else {
                            input.classList.remove('is-invalid');
                        }
                    });

                    return isValid;
                }

                // On form submission
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    if (!validateForm()) {
                        formError.style.display = 'flex';
                        formError.style.alignItems = 'center';
                        formError.style.gap = '8px';

                        setTimeout(() => {
                            formError.style.display = 'none';
                        }, 3000);

                        return;
                    }

                    // Disable button
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span>Sending...</span> <i class="fas fa-spinner fa-spin"></i>';

                    // Show success message
                    successAlert.classList.add('show');

                    // Actually submit the form
                    setTimeout(() => {
                        form.submit();
                    }, 1000);

                    // Hide success message after 4 seconds
                    setTimeout(() => {
                        successAlert.classList.remove('show');
                    }, 4000);
                });

                // Remove validation alerts when typing
                const inputs = form.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                        formError.style.display = 'none';
                    });
                });

                // Show success message if session exists
                @if(session('success'))
                    successAlert.classList.add('show');
                    setTimeout(() => {
                        successAlert.classList.remove('show');
                    }, 4000);
                @endif
            })();
        </script>

        <!-- Additional JS Files -->
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
