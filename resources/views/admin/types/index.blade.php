@extends('admin.layouts.base')

@section('title', 'Index')

@section('main') 

    <div class="index container">
    
        <h1>TYPES</h1>

            {{-- conferma delete --}}
            {{-- @if (session('harddelete_success'))
                @php $type = session('harddelete_success') @endphp
                <div class="alert alert-danger m-0 mb-3">
                    "{{ $type->title }}" Permanently Deleted
                </div>
            @endif --}}

            {{-- conferma delete --}}
            {{-- @if (session('softdelete_success'))
                @php $type = session('softdelete_success') @endphp
                <div class="alert alert-danger m-0 mb-3">
                    "{{ $type->title }}" Soft Deleted
                    <form
                        action="{{ route("admin.types.restore", ['type' => $type]) }}"
                        method="type"
                        class="d-inline-block restore-btn"
                    >
                        @csrf
                        <button class="btn btn-warning">Restore</button>
                    </form>
                </div>
            @endif --}}

            {{-- conferma restore --}}
            {{-- @if (session('restore_success'))
                @php $type = session('restore_success') @endphp
                <div class="alert alert-success">
                    "{{ $type->title }}" Restored
                </div>
            @endif --}}

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
                            <!-- Button soft delete -->
                            <form
                                action="{{ route('admin.types.destroy', ['type' => $type->id]) }}"
                                method="type"
                                class="d-inline-block"
                            >
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
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

            {{-- Trash Can --}}
            {{-- <a class="btn btn-warning" href="{{ route('admin.types.trashed') }}">
                Trash Can
                <i class="bi bi-trash3"></i>
            </a> --}}
        </div>

    </div>

@endsection