@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Type Management</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('type.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Type Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter color name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('type.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
