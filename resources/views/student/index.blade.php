<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Student List</title>
</head>

<body>
    <h2>Students</h2>
    <div><a href="{{route('student-form')}}">Create Student</a></div>

    <div class="output-delete">

    </div>
    <table border="1" id="students-table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th colspan="2">Action</th>
        </tr>
    </table>

    <script type="application/javascript">
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "{{route('home')}}",
                success: function(data) {
                    let students = data.student;
                    if (students.length > 0) {
                        for (let i = 0; i < students.length; i++) {
                            var editPath = "{{route('edit-student', ':studentId')}}";
                            editPath = editPath.replace(':studentId', students[i].id);

                            $("#students-table").append(`<tr>
                            <td>${students[i].id}</td>
                            <td>${students[i].name}</td>
                            <td>${students[i].email}</td>
                            <td><img src="{{asset('storage/${students[i].image}')}}" alt="student_image" height="70"/></td>
                            <td><a href="${editPath}">Edit</a></td>
                            <td><a href="#" class='delete-data' data-id='${students[i].id}'>Delete</a></td>
                            </tr>`);
                        }
                    } else {
                        $("#students-table").append("<tr><td colspan=4>Record Not Found!</td></tr>");
                    }
                },
                error: function(err) {
                    alert(err);
                }
            });

            $("#students-table").on("click", ".delete-data", function() {
                var id = $(this).attr('data-id');
                var obj = $(this);

                var url = "{{route('delete-student',':id')}}";
                url = url.replace(':id', id);

                $.ajax({
                    method: "GET",
                    url: url,
                    success: function(data) {
                        $(obj).parent().parent().remove();
                        $(".output-delete").text(`${data.name}  deleted successfully...!`);
                    },
                    error: function(err) {
                        console.log(err.responseText);
                    }

                });
            });
        });
    </script>

</body>

</html>