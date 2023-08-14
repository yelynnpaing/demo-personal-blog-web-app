@extends('admin-panel.master')
@section('content')
    {{-- SKILLS  --}}
    <div class="container-fluid body-content body-content bg-secondary">
        <div class="row">
            <div class="col-md-12">
                <div class="skills bg-light m-5 p-5">
                    <h2 class="text-success">
                        Skills
                        <hr class="mt-2">
                    </h2>
                    @if (session('successMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div>{{ session('successMsg') }}</div>
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <a href="{{ url('admin/skills/create') }}" class="btn rounded btn-outline-primary mb-4 float-end">
                        <i class="fa fa-plus-circle"></i>
                        Add New Skill
                    </a>
                    <table class="table table-bordered table-hover shadow-sm">
                        <thead class="bg-secondary">
                            <tr class="text-white">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Percent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($skills as $skill)
                            <tr>
                                <td>{{ $skill->id }}</td>
                                <td>{{ $skill->name }}</td>
                                <td>{{ $skill->percent }}</td>
                                <td>
                                    <form action="{{ url('admin/skills/'.$skill->id.'') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('admin/skills/'.$skill->id.'/edit') }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger" type="submit"
                                        onclick="return confirm('Are you sure want to delete ?')"
                                        >
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {{ $skills->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
