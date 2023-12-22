<table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">ID Person</th>
                <th scope="col">Carrier</th>
                <th scope="col">Faculty</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->id_person }}</td>
                    <td>{{ $student->carrier }}</td>
                    <td>{{ $student->faculty }}</td>
                    <td>
                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-student')
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-student')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this student?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Student Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>
