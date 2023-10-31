<table class="table table-striped text-center border">

    <thead>
        <tr>
            <th scope="col">Student Id</th>
            <th scope="col">
                Name
                <div class="d-flex justify-content-between">
                   <a href="javascript:void(0)" id="studentNameUp"> <ion-icon name="caret-up-circle-outline" ></ion-icon></a>
                    <a href="javascript:void(0)" id="studentNameDown"><ion-icon name="caret-down-circle-outline" ></ion-icon></a>
                </div>
            </th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Address</th>
            <th scope="col">Subject Register</th>
            <th scope="col">Exam Register</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($students))
            @foreach ($students as $student)
                <tr @if (str_contains($student->name, 'unverified')) class="text-danger" @endif>
                    <td>{{ $student->id }}</td>
                    <td>{{ str_replace('unverified', '', $student->name) }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->mobile }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->subject_count }}</td>
                    <td>{{ $student->exam_count }}</td>
                    @if (isset($past))
                        <td class="d-flex">
                            <a href="/admin/student/restore/{{ $student->id }}"
                                class="btn btn-outline-info">Restore</a>
                            <a href="/admin/student/permanentdelete/{{ $student->id }}"
                                class="btn btn-outline-danger">Permanent Delete</a>
                        </td>
                    @else
                        <td class="d-flex">
                            @if (str_contains($student->name, 'unverified'))
                                <form action="/admin/teacher/accept/{{ $student->id }}" method="get"
                                    class="teacherApprovedForm">
                                    <input type="submit" class="btn btn-outline-success" value="Approved">
                                </form>
                                <form action="/admin/student/delete/{{ $student->id }}" method="get"
                                    class="teacherDispprovedForm">
                                    <input type="submit" class="btn btn-outline-danger" value="Disapproved">
                                </form>
                            @else
                                <a href="/admin/student/delete/{{ $student->id }}"
                                    class="btn btn-outline-danger">Delete</a>
                            @endif
                        </td>
                    @endif

                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div>
    {{ $students->links('pagination::bootstrap-4') }}
</div>
