@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Color Management</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('color.update', $color) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="name">Color Name</label>
                            <input type="text" name="name" value="{{ $color->name }}" class="form-control" placeholder="Enter color name">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('color.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
