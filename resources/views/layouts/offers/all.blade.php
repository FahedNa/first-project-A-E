<html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">
        {{-- bootstrap --}}
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <!-- Styles / Scripts -->
                    <link rel="preload" as="style" href="http://127.0.0.1:8000/build/assets/app-CEk-HYa9.css"><link rel="modulepreload" as="script" href="http://127.0.0.1:8000/build/assets/app-BAHhzWsE.js"><link rel="stylesheet" href="http://127.0.0.1:8000/build/assets/app-CEk-HYa9.css"><script type="module" src="http://127.0.0.1:8000/build/assets/app-BAHhzWsE.js"></script>            </head>
    <body >
          @if (Session::has('success'))
            <div class="alert alert-success">
                {{session()->get('success'); }}
            </div>

            @endif
          @if (Session::has('error'))
            <div class="alert alert-danger">
                {{session()->get('error'); }}
            </div>

            @endif

       <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Offer Name</th>
      <th scope="col">Offer Price</th>
      <th scope="col">Offer Details</th>
      <th scope="col">Offer Operation</th>
    </tr>
  </thead>
  <tbody>
    {{-- model name --}}
    @foreach ($offers as $offer )
    <tr>
      <th scope="row">{{ $offer -> id }}</th>
      <td>{{ $offer -> name }}</td>
      <td>{{ $offer -> price }}</td>
      <td>{{ $offer -> details }}</td>
      <td> <a href="{{ url('offers/edit/'.$offer-> id) }}" class="btn btn-success">update</a>
     <a href="{{ route('offers.delete',$offer -> id) }}" class="btn btn-danger">delete</a></td>
    </tr>
 @endforeach
  </tbody>
</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
