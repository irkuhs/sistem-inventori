@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="card-tools float-right">
                        <a href="{{ route('color.index') }}" class="btn btn-ls btn-outline-primary">Color-Management</a>
                        <a href="{{ route('type.index') }}" class="btn btn-ls btn-outline-primary">Type-Management</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
