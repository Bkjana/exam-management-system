@extends('../layout/main')

@push('title')
    Admin DashBoard
@endpush

@section('main-section')
    <x-navbar homeName="{{ session('admin')->name }}" homeLink="/admin" subjectLink="/admin/subject" examLink="/admin/exam"
        logoutLink="/admin/logout" profileLink="/admin/profile" />
    <h1 class="text-center">All Teachers</h1>

    <div class="d-flex justify-content-between m-2">


        
            <a href="/admin/teacher" class="btn btn-outline-info">Show All Teacher</a>
        
            <form action="/admin/teacher/teacherSearch" method="get" id="teacherSerach">
                <input type="text" name="search" id="teacherSearchInput">
                <input type="submit" class="btn">
            </form>
        

    </div>
    <table class="table table-striped text-center border">

        <thead>
            <tr>
                <th scope="col">Teacher Id</th>
                <th scope="col" class="d-flex justify-content-between">
                    {{-- <div class="flex-column d-flex justify-content-between"> --}}
                    <ion-icon name="caret-up-circle-outline" id="teacherNameUp"></ion-icon>
                    <div>Name</div>
                    <ion-icon name="caret-down-circle-outline" id="teacherNameDown"></ion-icon>
                    {{-- </div> --}}
                </th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Subject Assign</th>
                <th scope="col" class="d-flex justify-content-center">
                    {{-- < class="flex-column d-flex justify-content-between font-weight-light"> --}}
                        <input type="radio" name="same" id="teacherApprovedList" @if (isset($approved) && $approved==1) checked @endif> <span class="font-weight-light">Approved</span>
                            <div>Action</div>
                        <input type="radio" name="same" id="teacherDisapprovedList" @if (isset($approved) && $approved==0) checked @endif><span class="font-weight-light">Dispproved</span>
                    {{-- </div> --}}
                </th>
            </tr>
        </thead>
        <tbody id="teacherTableBody">

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
                                <a href="/admin/teacher/restore/{{ $teacher->id }}"
                                    class="btn btn-outline-info">Restore</a>
                                <a href="/admin/teacher/permanentdelete/{{ $teacher->id }}"
                                    class="btn btn-outline-danger">Permanent
                                    Delete</a>
                            </td>
                        @else
                            <td class="d-flex text-center">
                                @if (str_contains($teacher->name, 'unverified'))
                                    <a href="{{ asset('storage/pdfs/' . $teacher->id . '.pdf') }}"
                                        class="btn btn-outline-info" target="-blank">Show Resume</a>

                                    <form action="/admin/teacher/accept/{{ $teacher->id }}" method="get"
                                        class="teacherApprovedForm">
                                        <input type="submit" class="btn btn-outline-success" value="Approved">
                                    </form>
                                    <form action="/admin/teacher/delete/{{ $teacher->id }}" method="get"
                                        class="teacherDispprovedForm">
                                        <input type="submit" class="btn btn-outline-danger" value="Disapproved">
                                    </form>
                                @else
                                    <a href="/admin/teacher/delete/{{ $teacher->id }}"
                                        class="btn btn-outline-danger">Delete</a>
                                @endif
                            </td>
                        @endif

                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $teachers->links('pagination::bootstrap-4') }}
@endsection
