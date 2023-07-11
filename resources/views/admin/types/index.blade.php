@extends('admin.layouts.base')

@section('title', 'Index')

@section('main') 

    <div class="index container">
    
        <h1>TYPES</h1>

            {{-- conferma delete --}}
            @if (session('delete_success'))
                @php $type = session('delete_success') @endphp
                <div class="alert alert-danger m-0 mb-3">
                    "{{ $type->name }}" Permanently Deleted
                </div>
            @endif


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.types.show', ['type' => $type->id]) }}">View</a>
                            <a class="btn btn-warning" href="{{ route('admin.types.edit', ['type' => $type->id]) }}">Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger myModal" data-bs-toggle="modal" data-bs-target="#myInput" data-id="{{ $type->id }}">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Paginator --}}
        <div class="paginator">
            {{ $types->links() }}
        </div>

        {{-- other buttons --}}
        <div>
            {{-- Add New type --}}
            <a class="btn btn-primary" href="{{ route('admin.types.create') }}">Add new type</a>
        </div>

        <!-- Modal -->
        <div class="modal fade w-100" id="myInput" tabindex="-1" aria-labelledby="myInput" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        This will permanently delete it!
                    </div>
                    <div class="modal-footer">
                    
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>

                        <form
                            action="{{ route("admin.types.destroy", ['type' => '***']) }}"
                            {{-- action="http://localhost:8000/admin/types/0/destroy" --}}
                            method="POST"
                            class="d-inline-block"
                            id="myForm"
                        >
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection