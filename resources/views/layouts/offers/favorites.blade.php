<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container mt-5">

    <h2 class="section-title mb-4">
        <i class="fas fa-heart text-danger"></i> My Favorite Properties
    </h2>

    <div class="cards">

        @forelse($favorites as $favorite)

        @php
            $property = $favorite->property;
        @endphp

        <div class="property-card">

            <!-- Image -->
            <div class="card-image">
                <img src="{{ asset('uploads/properties/' . $property->Image) }}"
                     alt="{{ $property->Property_Title }}">

                <div class="property-badge">
                    {{ $property->Property_Type }}
                </div>

                <div class="status-badge status-{{ strtolower($property->Status) }}">
                    {{ $property->Status }}
                </div>
            </div>

            <!-- Content -->
            <div class="card-content">

                <h3 class="property-title">
                    {{ $property->Property_Title }}
                </h3>

                <div class="property-location">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $property->Street_Address }}
                </div>

                <p class="property-description">
                    @php
                        $description = $property->Description;
                        $shortDescription = strlen($description) > 120
                            ? substr($description, 0, 117) . '...'
                            : $description;
                    @endphp

                    {{ $shortDescription }}
                </p>

                <!-- Features -->
                <div class="property-features">

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-bed"></i>
                        </div>
                        <div class="feature-label">Bedrooms</div>
                        <div class="feature-value">
                            {{ $property->Bedrooms }}
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-bath"></i>
                        </div>
                        <div class="feature-label">Bathrooms</div>
                        <div class="feature-value">
                            {{ $property->Bathrooms }}
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-ruler-combined"></i>
                        </div>
                        <div class="feature-label">Square Feet</div>
                        <div class="feature-value">
                            {{ $property->Square_Feet }}
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="feature-label">Floor</div>
                        <div class="feature-value">
                            {{ $property->floor }}
                        </div>
                    </div>

                </div>

                <!-- Price -->
                <div class="price-tag">
                    ${{ number_format($property->Price, 2) }}
                </div>
<!-- Phone -->
                <div class="property-meta">
                    <p class="meta-value">
                        Contact Number: {{ $property->phone_num }}
                    </p>
                </div>

                <!-- Remove Button -->
                <form action="{{ route('favorites.remove', $property->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger w-100">
                        <i class="fas fa-trash"></i> Remove from Favorite
                    </button>
                </form>

            </div>

        </div>

        @empty

        <div class="alert alert-info">
            No favorite properties yet.
        </div>

        @endforelse

    </div>

</div>

</body>
</html>
