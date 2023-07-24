@if (isset($teachers))
    @foreach ($teachers as $teacher)
        <tr @if (str_contains($teacher->name, 'unverified')) class="text-danger" @endif>
            <td>{{ $teacher->id }}</td>
            <td>{{ str_replace('unverified', '', $teacher->name) }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->mobile }}</td>
            <td>{{ $teacher->address }}</td>
            <td>{{ $teacher->teacher_count }}</td>
            {{-- <td>{{$student->exam_count}}</td> --}}
            @if (isset($past))
                <td class="d-flex">
                    <a href="/admin/teacher/restore/{{ $teacher->id }}" class="btn btn-outline-info">Restore</a>
                    <a href="/admin/teacher/permanentdelete/{{ $teacher->id }}" class="btn btn-outline-danger">Permanent
                        Delete</a>
                </td>
            @else
                <td class="d-flex text-center">
                    @if (str_contains($teacher->name, 'unverified'))
                        <a href="{{ asset('storage/pdfs/' . $teacher->id . '.pdf') }}" class="btn btn-outline-info"
                            target="-blank">Show Resume</a>

                        <form action="/admin/teacher/accept/{{ $teacher->id }}" method="get"
                            class="teacherApprovedForm">
                            <input type="submit" class="btn btn-outline-success" value="Approved">
                        </form>
                        <form action="/admin/teacher/delete/{{ $teacher->id }}" method="get"
                            class="teacherDispprovedForm">
                            <input type="submit" class="btn btn-outline-danger" value="Disapproved">
                        </form>
                    @else
                        <a href="/admin/teacher/delete/{{ $teacher->id }}" class="btn btn-outline-danger">Delete</a>
                    @endif
                </td>
            @endif

        </tr>
        @endforeach
@endif



