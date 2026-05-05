<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Estate Offices Management</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, system-ui, sans-serif;
            background: #f5f7f6;
            margin: 0;
            padding: 2rem 1rem;
        }
        .container {
            max-width: 1280px;
            margin: 0 auto;
        }
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e2e8e6;
        }
        .card-header {
            background: #2f6f64;
            padding: 1.2rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .card-header h3 {
            margin: 0;
            color: white;
            font-weight: 600;
            font-size: 1.4rem;
        }
        .btn-primary {
            background: white;
            color: #2f6f64;
            text-decoration: none;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover {
            background: #f0f0f0;
            transform: translateY(-1px);
        }
        .card-body {
            padding: 1.2rem 1.5rem 1.5rem;
        }
        .alert-success {
            background: #e0f2ef;
            color: #14564b;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            margin-bottom: 1.2rem;
            border-right: 4px solid #2f6f64;
            font-weight: 500;
            transition: opacity 0.5s ease;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        th {
            text-align: left;
            padding: 0.9rem 0.8rem;
            background: #f8faf9;
            color: #1f4e46;
            font-weight: 700;
            border-bottom: 2px solid #2f6f64;
        }
        td {
            padding: 0.9rem 0.8rem;
            border-bottom: 1px solid #e9edf0;
            vertical-align: middle;
            color: #2c5a52;
        }
        tr:hover {
            background: #fefef7;
        }
        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
            border: none;
            padding: 0.35rem 1rem;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.15s;
        }
        .btn-delete:hover {
            background: #fecaca;
        }
        .text-center {
            text-align: center;
        }
        .empty-message {
            text-align: center;
            padding: 2.5rem;
            color: #6c8b82;
            font-size: 0.95rem;
        }
        @media (max-width: 700px) {
            body { padding: 1rem; }
            .card-header h3 { font-size: 1.2rem; }
            th, td { padding: 0.6rem 0.5rem; font-size: 0.8rem; }
            .btn-delete { padding: 0.25rem 0.7rem; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>🏢 Real Estate Offices Management</h3>
            <a href="{{ route('admin.offices.create') }}" class="btn-primary">+ Add New Office</a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert-success" id="successMessage">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if(session('success'))
            <script>
                setTimeout(function() {
                    var msg = document.getElementById('successMessage');
                    if (msg) {
                        msg.style.opacity = '0';
                        setTimeout(function() {
                            if (msg && msg.parentNode) {
                                msg.parentNode.removeChild(msg);
                            }
                        }, 500);
                    }
                }, 3000);
            </script>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Office Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($offices as $office)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $office->name }}</td>
                        <td>{{ $office->address }}</td>
                        <td>{{ $office->phone }}</td>
                        <td>{{ $office->email }}</td>
                        <td>
                            <form action="{{ route('admin.offices.destroy', $office) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this office?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">✖ Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-message">📭 No real estate offices found. Click "Add New Office" to get started.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
