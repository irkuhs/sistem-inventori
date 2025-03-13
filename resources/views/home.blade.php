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
                        <a href="{{ route('item.create') }}" class="btn btn-ls btn-outline-primary float-end">Add Item</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder="Search item" value="{{ request()->search }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                        <button class="btn btn-outline-danger" type="button" onclick="window.location.href='{{ route('home') }}'">X</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Type</th>
                                <th scope="col">Item Color</th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type->name }}</td>
                                    <td>{{ $item->color->name }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('item.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('item.show', $item) }}" class="btn btn-sm btn-success">Show</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Confirm Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Are you sure you want to delete this item {{ $item->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('item.destroy', $item) }}" method="POST" class="d-inline">
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
                                    <td colspan="4" class="text-center">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            {{ $items->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
