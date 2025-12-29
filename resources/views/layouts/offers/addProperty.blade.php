<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Property</title>
    <link rel="stylesheet" href="{{ asset('css/styleadd.css') }}">
    {{-- bootstrap --}}
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
 @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{session()->get('success'); }}
            </div>

            @endif
<div class="container">
    <h2>🏠 Add New Property</h2>

    <form method="POST" action="{{ route('add.store') }}">
        @csrf
        <div class="form-group">
            <label>Property Title</label>
            <input type="text" name="Property_Title" placeholder="Beautiful Family Home">
             @error('Property_Title')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea placeholder="Describe the property..." name="Description"></textarea>
             @error('Description')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="Price" placeholder="500000">
                 @error('Price')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
            </div>

            <div class="form-group">
                <label>Property Type</label>
                <input type="text" name="Property_Type" placeholder="Home,Apartment,Villa,Floor,shop,......">
                 @error('Property_Type')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
            </div>

            {{-- <div class="form-group">
                <label>Property Type</label>
                <select>
                    <option>House</option>
                    <option>Apartment</option>
                    <option>Villa</option>
                </select>
            </div> --}}
        </div>

        <div class="form-group">
            <label>Street Address</label>
            <input type="text" name="Street_Address" placeholder=" Main St">
              @error('Street_Address')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
        </div>

        <div class="grid-2">

            <div class="form-group">
                <label>phone_num</label>
                <input type="number" placeholder="09........" name="phone_num">
                  @error('phone_num')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
            </div>
            <div class="form-group">
                <label>floor</label>
                <input type="number" placeholder="1.2.3.4.5......." name="floor">
                  @error('floor')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
            </div>
        </div>

        <div class="grid-3">
            <div class="form-group">
                <label>Bedrooms</label>
                <input type="number" placeholder="3" name="Bedrooms">
                  @error('Bedrooms')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
            </div>

            <div class="form-group">
                <label>Bathrooms</label>
                <input type="number" step="0.5" placeholder="2" name="Bathrooms">
                    @error('Bathrooms')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
            </div>

            <div class="form-group">
                <label>Square Feet</label>
                <input type="number" placeholder="2000" name="Square_Feet">
                     @error('Square_Feet')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
            </div>
        </div>

        <div class="grid-2">
            {{-- <div class="form-group">
                <label>Status</label>
                <select>
                    <option>Available</option>
                    <option>Sold</option>
                    <option>Pending</option>
                </select>
            </div> --}}

            <div class="form-group">
                <label>Status</label>
                <input type="text" placeholder="Available,Sold,Pending,..." name="Status">
                    @error('Status')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
            </div>

            <div class="form-group">
                <label>Image URL (Optional)</label>
                <input type="text" placeholder="https://example.com/image.jpg" name="Image">
                    @error('Image')
    <small class="form-text text-danger">{{$message}} </small>
    @enderror
            </div>
        </div>

        <div class="buttons">
            <button type="submit" class="btn-primary">Add Property</button>
            <button type="button" class="btn-secondary">Cancel</button>
        </div>
    </form>
</div>

</body>
</html>
