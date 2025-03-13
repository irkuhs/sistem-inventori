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
                    <div class="card-tools float-right">
                        <a href="{{ route('home') }}" class="btn btn-ls btn-outline-primary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row mb-2">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Item Name</label>
                        <div class="col-md-6">
                            <input type="text" value="{{ $item->name }}" name="name" class="form-control" id="name" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="type" class="col-md-4 col-form-label text-md-right">Item Type</label>
                        <div class="col-md-6">
                            <input type="text" value="{{ $item->type->name }}" name="type" class="form-control" id="type" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="color" class="col-md-4 col-form-label text-md-right">Item Color</label>
                        <div class="col-md-6">
                            <input type="text" value="{{ $item->color->name }}" name="color" class="form-control" id="color" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="quantity" class="col-md-4 col-form-label text-md-right">Item Quantity</label>
                        <div class="col-md-6">
                            <input type="text" name="quantity" value="{{ $item->quantity_display }}" class="form-control" id="quantity" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
