@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Item Management</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('item.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Item Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter color name" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="type">Item Type</label>
                            <select name="type" class="form-control" id="type" required>
                                <option value="" selected disabled>Select Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="color">Item Color</label>
                            <select name="color" class="form-control" id="color" required>
                                <option value="" selected disabled>Select Color</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="price">Item Quantity</label>
                            <input type="text" name="quantity" class="form-control" id="price" placeholder="Enter item quantity" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
