<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4" style="text-align: center;color: #2f6f64"><b>Spicial_Order</b></h2>

    <table class="table table-bordered" >
        <thead class="table-dark" >
            <tr >
                <th style="background-color:#2f6f64">#</th>
                <th style="background-color:#2f6f64">NumberPhone</th>
                <th style="background-color:#2f6f64">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->number }}</td>
                <td>{{ $result->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary" style="background-color:#2f6f64">Back</a>
</div>

</body>
</html>
