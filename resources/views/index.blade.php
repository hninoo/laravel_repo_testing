<html>

<head>
    <title>Laravel 6 CORS Middleware Tutorial - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
</head>

<body>

    <script type="text/javascript">
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'http://localhost:8000/apiv1/test_cors',
            success: function(data) {
                console.log(data);
            }
        });

    </script>

</body>

</html>
