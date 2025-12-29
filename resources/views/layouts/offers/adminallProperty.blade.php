<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Properties - Luxury Real Estate</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-home me-2"></i>Prime Properties
            </a>
            <div class="ms-auto">
                <span class="badge bg-light text-dark fs-6">
                    <i class="fas fa-building me-1"></i> {{ $add->count() }} Properties
                </span>
            </div>
        </div>
    </nav>

  <br>
  <br>
  <br>
    <!-- Messages Alerts -->
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="container">
        <!-- Stats Overview -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stat-number">{{ $add->count() }}</div>
                    <div class="stat-label">Total Properties</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stat-number">
                        {{ $add->where('Status', 'Available')->count() }}
                    </div>
                    <div class="stat-label">Available Now</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    @php
                        $avgPrice = $add->avg('Price');
                        $formattedAvgPrice = $avgPrice ? number_format($avgPrice, 0) : '0';
                    @endphp
                    <div class="stat-number">${{ $formattedAvgPrice }}</div>
                    <div class="stat-label">Average Price</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stat-number">
                        {{ $add->unique('Property_Type')->count() }}
                    </div>
                    <div class="stat-label">Property Types</div>
                </div>
            </div>
        </div>

        <!-- Properties Section -->
        <h2 class="section-title">Featured Properties</h2>

        <!-- Properties Grid -->
        <div class="cards">
            @foreach($add as $property)
            <div class="property-card">
                <!-- Property Image -->
                <div class="card-image">
                    <img src="{{ asset('1.png') }}" alt="{{ $property->Property_Title }}">
                    <div class="property-badge">{{ $property->Property_Type }}</div>
                    <div class="status-badge status-{{ strtolower($property->Status) }}">
                        {{ $property->Status }}
                    </div>
                </div>

                <!-- Property Details -->
                <div class="card-content">
                    <!-- Title and Location -->
                    <h3 class="property-title">{{ $property->Property_Title }}</h3>
                    <div class="property-location">
                        <i class="fas fa-map-marker-alt"></i> {{ $property->Street_Address }}
                    </div>

                    <!-- Description -->
                    <p class="property-description">
                        @php
                            $description = $property->Description;
                            $shortDescription = strlen($description) > 120 ? substr($description, 0, 117) . '...' : $description;
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
                            <div class="feature-value">{{ $property->Bedrooms }}</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-bath"></i>
                            </div>
                            <div class="feature-label">Bathrooms</div>
                            <div class="feature-value">{{ $property->Bathrooms }}</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-ruler-combined"></i>
                            </div>
                            <div class="feature-label">Square Feet</div>
                            <div class="feature-value">{{ $property->Square_Feet }}</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div class="feature-label">Floor</div>
                            <div class="feature-value">{{ $property->floor }}</div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="price-tag">
                        ${{ number_format($property->Price, 2) }}
                    
                    </div>

                    <!-- Additional Info -->
                    <div class="property-meta">
                        <div class="meta-item">
                            <div class="meta-label">Contact Number</div>
                            <div class="meta-value">{{ $property->phone_num }}</div>
                        </div>

                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('Property.edit', $property->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Edit Property
                        </a>
                        <form action="{{ route('Property.delete', $property->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this property?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

</body>
</html>
