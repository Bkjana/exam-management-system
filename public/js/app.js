$(document).ready(function () {

    {
        //Admin teacher section start.....................

        // approved the teacher
        $(".teacherApprovedForm").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'get',
                success: function (r) {
                    document.write(r);
                    document.close();
                    // console.log(r);
                }
            });
        });

        // disapproved the teacher
        $(".teacherDispprovedForm").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'get',
                success: function (r) {
                    document.write(r);
                    document.close();
                    // console.log(r);
                }
            });
        });

        // teacher sort name assending order
        $("#teacherNameUp").click(function () {
            $.ajax({
                url: "/admin/teacher/sort/nameUp",
                type: 'get',
                success: function (r) {
                    console.log("up");
                    document.write(r);
                    document.close();
                }
            })
        });

        // teacher sort name dessending oreder
        $("#teacherNameDown").click(function () {
            $.ajax({
                url: "/admin/teacher/sort/nameDown",
                type: 'get',
                success: function (r) {
                    console.log("down");
                    document.write(r);
                    document.close();
                }
            })
        });

        // teacher list who are approved on click approved button
        $("#teacherApprovedList").click(function () {
            $.ajax({
                url: "/admin/teacher/approved",
                type: 'get',
                success: function (r) {
                    document.write(r);
                    document.close();
                }
            })
        });

        // teacher list who are disapproved on click disapproved button
        $("#teacherDisapprovedList").click(function () {
            $.ajax({
                url: "/admin/teacher/disapproved",
                type: 'get',
                success: function (r) {
                    document.write(r);
                    document.close();
                }
            })
        });

        // searching using name on submit search box
        $("#teacherSerach").submit(function (e) {
            e.preventDefault();
            val = $("#teacherSearchInput").val();
            $.ajax({
                url: "/admin/teacher/teacherSearch/" + val,
                type: 'get',
                success: function (r) {
                    document.write(r);
                    document.close();
                    // console.log(r);
                    $("#teacherSearchInput").val(val);
                }
            });
        })

        //Admin teacher section end............

    }




    {
        // Admin student Selection start......

        //sort student using name ascending order
        $("#studentNameUp").click(function () {
            console.log("click");
            $.ajax({
                url: "/admin/student/studentSortAscending",
                dataType: 'json',
                success: function (response) {
                    $("#studentTableBody").html(response);
                    $(document).on('click', '.pagination a', function (event) {
                        event.preventDefault();
                        var page = $(this).attr('href').split('page=')[1];
                        page = "/admin/student/studentSortAscending?page=" + page;
                        fetch_data(page);
                    });
                },
                error: function (error) {
                    console.error('Error fetching students data: ', error);
                }
            });
        });

        //sort student using name descending order
        $("#studentNameDown").click(function () {
            console.log("click");
            $.ajax({
                url: "/admin/student/studentSortDescending",
                dataType: 'json',
                success: function (response) {
                    $("#studentTableBody").html(response);
                    $(document).on('click', '.pagination a', function (event) {
                        event.preventDefault();
                        var page = $(this).attr('href').split('page=')[1];
                        page = "/admin/student/studentSortDescending?page=" + page;
                        fetch_data(page);
                    });
                },
                error: function (error) {
                    console.error('Error fetching students data: ', error);
                }
            });
        });

        function fetch_data(page) {
            $.ajax({
                url: page,
                success: function (data) {
                    $('#studentTableBody').html(data);
                }
            });
        }

        //search student in admin panel
        $("#studentSerach").submit(function (e) {
            e.preventDefault();
            val = $("#studentSearchInput").val();
            $.ajax({
                url: "/admin/student/studentSearch/" + val,
                type: 'get',
                success: function (response) {
                    $("#studentTableBody").html(response);
                    $("#studentSearchInput").val(val);
                    $(document).on('click', '.pagination a', function (event) {
                        event.preventDefault();
                        var page = $(this).attr('href').split('page=')[1];
                        page = "/admin/student/studentSearch/"+val+"/?page=" + page;
                        fetch_data(page);
                    });
                }
            });
        })





        
    }



});