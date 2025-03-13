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
                    <form action="{{ route('item.update', $item) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="name">Item Name</label>
                            <input type="text" value="{{ $item->name }}" name="name" class="form-control" id="name" placeholder="Enter color name" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="type">Item Type</label>
                            <select name="type" class="form-control" id="type" required>
                                <option value="" selected disabled>Select Type</option>
                                @foreach ($types as $type)
                                    @if ($type->id === $item->type_id)
                                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                    @else
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="color">Item Color</label>
                            <select name="color" class="form-control" id="color" required>
                                <option value="" selected disabled>Select Color</option>
                                @foreach ($colors as $color)
                                    @if ($color->id === $item->color_id)
                                        <option value="{{ $color->id }}" selected>{{ $color->name }}</option>
                                    @else
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="price">Item Quantity</label>
                            <input type="text" name="quantity" value="{{ $item->quantity }}" class="form-control" id="price" placeholder="Enter item quantity" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
