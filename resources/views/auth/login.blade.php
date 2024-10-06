<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AB BLOGGER ADMIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/plugins/toastr/toastr.min.css">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>AB BLOGGER</b> Admin</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form id="loginForm">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="email" required class="form-control" placeholder="Email" id="email" name="email">

                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="password"
                            name="password">

                    </div>
                    <div class="row">
                        <div class="col-4 offset-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="http://127.0.0.1:8000/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="http://127.0.0.1:8000/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://127.0.0.1:8000/assets/dist/js/adminlte.min.js"></script>

    <script src="http://127.0.0.1:8000/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/plugins/toastr/toastr.min.js"></script>

    <script>
        $(function () {
            // jQuery Validation
            $('#loginForm').validate({
                submitHandler: function(form) {
                    $.ajax({
                        url: '{{ route('login.submit') }}',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.message);
                                window.location.href = '/'; // Redirect to home or dashboard
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 401) {
                                toastr.error('Invalid credentials!');
                            } else {
                                toastr.error('Something went wrong!');
                            }
                        }
                    });
                },
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: "Please enter a valid email address",
                    password: "Password must be at least 6 characters long"
                }
            });
        });
    </script>

</body>

</html>
