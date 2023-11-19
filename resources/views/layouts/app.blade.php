<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <!-- Optional: Include your custom CSS here -->
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customers') }}">Customers</a>
                </li>
                <!-- Add other navigation links if needed -->
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    <div class="container">
        @yield('content')
    </div>
</main>

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
@stack('scripts')
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#customerForm').validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    // Add a rule for each of your input fields
                },
                messages: {
                    first_name: "Please enter the first name",
                    last_name: "Please enter the last name",
                    // Add a message for each of your input fields
                },
                submitHandler: function(form) {
                    // if form is valid, execute the AJAX call
                    submitFormWithAjax(form);
                }
            });
        });

        function submitFormWithAjax(form) {
            const url = $(form).attr('action');
            const method = $(form).attr('method');
            const data = $(form).serialize();

            $.ajax({
                url: url,
                type: method,
                data: data,
                success: function(response) {
                    // Handle success (e.g., display a success message and redirect)
                    console.log('Success:', response);
                    // Redirect or update UI accordingly
                },
                error: function(xhr, status, error) {
                    // Handle error (e.g., display error messages)
                    console.error('Error:', xhr.responseText);
                }
            });
        }
    </script>
@endpush


</body>
</html>
