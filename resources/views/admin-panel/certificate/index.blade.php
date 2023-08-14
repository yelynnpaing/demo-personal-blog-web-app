@extends('admin-panel.master')
@section('content')
    {{-- CERTIFICATES  --}}
    <div class="container-fluid body-content body-content bg-secondary">
        <div class="row">
            <div class="col-md-12">
                <div class="certificates bg-light m-5 p-5">
                    <h2 class="text-success">
                        Certificates
                        <hr class="mt-2">
                    </h2>
                    @if (session('successMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div>{{ session('successMsg') }}</div>
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <a href="{{ route('certificates.create') }}" class="btn rounded btn-outline-primary mb-4 float-end">
                        <i class="fa fa-plus-circle"></i>
                        Add New Certificate
                    </a>
                    <table class="table table-bordered table-hover shadow-sm">
                        <thead class="bg-secondary">
                            <tr class="text-white">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($certificates as $certificate)
                            <tr>
                                <td>{{ $certificate->id }}</td>
                                <td>{{ $certificate->name }}</td>
                                <td>{{ $certificate->count }}</td>
                                <td>
                                    <a href="{{ route('certificates.edit', $certificate->id) }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {{ $certificates->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
