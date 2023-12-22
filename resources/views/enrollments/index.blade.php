@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Enrollment List</div>
        <div class="card-body">
            @can('create-enrollment')
                <a href="{{ route('enrollments.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>
                    Add New Enrollment</a>
            @endcan
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Level</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enrollments as $enrollment)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $enrollment->level }}</td>
                            <td>{{ $enrollment->semester }}</td>
                            <td>
                                <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('enrollments.show', $enrollment->id) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    @can('edit-enrollment')
                                        <a href="{{ route('enrollments.edit', $enrollment->id) }}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    @endcan

                                    @can('delete-enrollment')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you want to delete this enrollment?');"><i
                                                class="bi bi-trash"></i> Delete</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4">
                            <span class="text-danger">
                                <strong>No Enrollment Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>

            {{ $enrollments->links() }}

        </div>
    </div>

    

@endsection


