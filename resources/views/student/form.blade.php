<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div>
        <h2>Student Form</h2>
    </div>

    <div><a href="{{route('student-list')}}">Students</a></div>
    <form enctype="multipart/form-data" id="my-form">
        @csrf

        <input type="text" name="name" id="" placeholder="Enter Your Name"> <br><br>
        <input type="email" name="email" id="" placeholder="Enter your Email"> <br><br>
        <input type="file" name="file" id=""> <br><br>
        <input type="submit" value="Add" id="btn-submit">
    </form>
    <span id="output"></span>

    <script type="application/javascript">
        $(document).ready(function() {
            $("#my-form").submit(function(event) {
                event.preventDefault();
                var form = $("#my-form")[0];
                var data = new FormData(form);

                $("#btn-submit").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('add-student') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $("#output").text(data.name + " Created Successfully!");
                        $("#btn-submit").prop("disabled", false);
                        form.reset();
                    },
                    error: function(err) {
                        $("#output").text(e.responseText);
                        $("#btn-submit").prop("disabled", false);
                        form.reset();
                    }
                });
            });
        });
    </script>

</body>

</html>