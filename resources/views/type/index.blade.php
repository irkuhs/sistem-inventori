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
                    <div class="card-tools float-end">
                        <a href="{{ route('home') }}" class="btn btn-ls btn-outline-primary">Home</a>
                        <a href="{{ route('type.create') }}" class="btn btn-ls btn-outline-primary">Add Type</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->created_at->diffForHumans() }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('type.edit', $type) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $type->id }}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $type->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $type->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $type->id }}">Confirm Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Are you sure you want to delete this type {{ $type->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('type.destroy', $type) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            {{ $types->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
