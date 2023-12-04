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
    <table border="1" id="students-table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
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
                            $("#students-table").append(`<tr>
                            <td>${students[i].id}</td>
                            <td>${students[i].name}</td>
                            <td>${students[i].email}</td>
                            <td><image src="{{asset('storage/${students[i].image}')}}" alt="stuent_image" height="70"/></td>
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
        });
    </script>
</body>

</html>