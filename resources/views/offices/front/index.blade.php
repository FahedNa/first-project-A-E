<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Estate Offices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: #eef5f2;
            font-family: 'Segoe UI', system-ui, sans-serif;
            padding: 2rem 1rem;
        }
        .back-button-container {
            max-width: 992px;
            margin: 0 auto 1rem auto;
            padding: 0 0.75rem;
        }
        .btn-landing {
            background: white;
            color: #2f6f64;
            border: 1.5px solid #2f6f64;
            border-radius: 2rem;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-landing:hover {
            background: #2f6f64;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(47,111,100,0.25);
        }
        .card-custom {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
            border: 1px solid #2f6f6420;
        }
        .card-header-custom {
            background: #2f6f64;
            padding: 1.5rem 2rem;
            color: white;
        }
        .card-header-custom h2 {
            margin: 0;
            font-weight: 600;
            font-size: 1.6rem;
        }
        .card-header-custom p {
            margin: 0.5rem 0 0;
            opacity: 0.85;
            font-size: 0.9rem;
        }
        .alert-custom {
            background: #e0f2ef;
            border-left: 4px solid #2f6f64;
            border-radius: 0.75rem;
            padding: 0.75rem 1.25rem;
            margin: 1.25rem 1.5rem 0;
            color: #14564b;
        }
        .table-wrapper {
            padding: 0 1rem 1.5rem 1rem;
            overflow-x: auto;
        }
        .office-table {
            width: 100%;
            border-collapse: collapse;
        }
        .office-table th {
            text-align: left;
            padding: 1rem 0.75rem;
            background: #f8fafc;
            font-weight: 600;
            color: #1f4e46;
            border-bottom: 2px solid #2f6f64;
        }
        .office-table td {
            padding: 1rem 0.75rem;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }
        .office-table tr:hover {
            background: #fefef5;
        }
        .index-badge {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            background: #ecf6f3;
            color: #2f6f64;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        .office-name {
            font-weight: 700;
            color: #1d4a42;
        }
        .office-name i {
            color: #2f6f64;
            margin-right: 6px;
        }
        .contact-chip {
            background: #f2f8f5;
            padding: 4px 12px;
            border-radius: 30px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
        }
        .contact-chip i {
            color: #2f6f64;
        }
        .email-text {
            direction: ltr;
            display: inline-block;
            font-family: monospace;
        }
        .empty-state {
            text-align: center;
            padding: 2.5rem;
        }
        .empty-state i {
            font-size: 3rem;
            color: #2f6f64;
            opacity: 0.5;
            margin-bottom: 1rem;
        }
        .empty-state h5 {
            color: #2f6f64;
            font-weight: 600;
        }
        .footer {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.75rem;
            color: #638b82;
        }
        @media (max-width: 768px) {
            body { padding: 1rem; }
            .card-header-custom h2 { font-size: 1.3rem; }
            .office-table th, .office-table td { padding: 0.7rem 0.5rem; }
            .btn-landing { padding: 0.4rem 1.2rem; font-size: 0.8rem; }
        }
    </style>
</head>
<body>

<div class="back-button-container">
    <a href="#" class="btn-landing" id="backToLandingBtn">
        <i class="fas fa-arrow-left"></i> Back to Landing Page
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h2><i class="fas fa-building me-2"></i> Real Estate Offices</h2>
                    <p>Verified agencies — trusted & professional</p>
                </div>

                @if(session('success'))
                <div class="alert-custom">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                </div>
                @endif

                <div class="table-wrapper">
                    <table class="office-table">
                        <thead>
                            <tr>
                                <th style="width: 70px;">#</th>
                                <th>Office Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($offices as $office)
                            <tr>
                                <td><span class="index-badge">{{ $loop->iteration }}</span></td>
                                <td><span class="office-name"><i class="fas fa-building"></i> {{ $office->name }}</span></td>
                                <td><i class="fas fa-location-dot" style="color:#2f6f64; margin-right: 5px;"></i> {{ $office->address }}</td>
                                <td><span class="contact-chip"><i class="fas fa-phone-alt"></i> {{ $office->phone }}</span></td>
                                <td><span class="contact-chip"><i class="fas fa-envelope"></i> <span class="email-text">{{ $office->email }}</span></span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    <i class="fas fa-store-slash"></i>
                                    <h5>No real estate offices found</h5>
                                    <p class="text-muted">Register your office to appear in this directory</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="footer">
                <span><i class="fas fa-shield-alt"></i> Licensed offices</span> &nbsp;|&nbsp;
                <span><i class="fas fa-clock"></i> 24/7 support</span> &nbsp;|&nbsp;
                <span><i class="fas fa-handshake"></i> 100% transparency</span>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('backToLandingBtn').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '/landing';
    });
</script>

</body>
</html>
