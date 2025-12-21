<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Properties</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
      {{-- bootstrap --}}
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .price {
            color: #000000;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
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
<div class="container">
    <h2>🏘 Properties</h2>
    <br><br>

    <div class="cards">
        @foreach($add as $add)
            <div class="card">
                <img src="{{  asset('1.png')}}">

                <div class="card-body">

                    <p><b>Title: </b>{{ $add->Property_Title}}</p>
                    <h3>Description</h3>
                    <p>{{ $add->Description }}</p>
                    <p><b>Property_Type: </b> {{ $add->Property_Type }}</p>
                    <p> <b>Street_Address: </b> {{ $add->Street_Address }}   </p>

                    <p>
                        🛏 {{ $add->Bedrooms }} |
                        🛁 {{ $add->Bathrooms }} |
                        📐 {{ $add->Square_Feet }} sqft | <b>Floor: </b> {{ $add->floor }}
                    </p>
                    <p>Status: <b>{{ $add->Status }}</b></p>
                    <p><b>Phone_number: </b> {{ $add->phone_num }} </p>
                    <p class="price">Price: {{$add->Price }}$</p>
                    {{--لانها غير موجودة فيcontroller select   id  كان ماعم ياخذ   --}}
                 <a href="{{ route('Property.edit',$add-> id) }}" class="btn btn-success">update</a>
                 <a href="{{ route('Property.delete',$add-> id) }}" class="btn btn-danger">delete</a>

                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
