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
    <body style="text-align: center; margin:180px">
        <div>
                form Yor details

        <div >
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{session()->get('success'); }}
            </div>

            @endif

            <br>
       <form method="POST" action="{{ route('offers.store') }}"  enctype="multipart/form-data">
        @csrf
        {{-- //photo --}}
        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >chose your photo</label>
    <input type="file" class="form-control" name="photo">
    @error('photo')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Offer name</label>
    <input type="text" class="form-control" name="name">
    @error('name')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Offer price</label>
    <input type="text" class="form-control" name="price">
      @error('price')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Offer details</label>
    <input type="text" class="form-control " name="details">
      @error('details')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
  </div>



  <button type="submit" class="btn btn-primary">Save Offer</button>
</form>
        </div>
 </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
