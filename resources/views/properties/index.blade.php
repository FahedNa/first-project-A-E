@extends('layout.master')

@section('content')
<section class="page-section" style="padding-top: 150px;">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">All Properties</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-home"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="lead text-center">Here you can find all our available properties.</p>
                <!-- Placeholder for properties list -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Villa</h5>
                        <p class="card-text">A beautiful villa with sea view.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Modern Apartment</h5>
                        <p class="card-text">Located in the city center.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
