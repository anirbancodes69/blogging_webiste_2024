@extends('layouts.app')

@section('title', 'Register')

@section('page_style')
<!-- Toastr -->
<link rel="stylesheet" href="{{ env('APP_ASSET_URL') }}/plugins/toastr/toastr.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Register User</h3>
            </div>
            <!-- /.card-header -->
            {{-- <div class="card-body">
            </div> --}}
            <form id="registerForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Confirm Password" required>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page_script')
<!-- jquery-validation -->
<script src="{{ env('APP_ASSET_URL') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ env('APP_ASSET_URL') }}/plugins/toastr/toastr.min.js"></script>


<script>
    $(function () {
         // jQuery Validation
        $('#registerForm').validate({
            submitHandler: function(form) {
                $.ajax({
                    url: '{{ route('register.submit') }}',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#registerForm')[0].reset();
                            toastr.success(response.message);
                        } else {
                            toastr.error('Something went wrong!');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Registration failed!');
                    }
                });
            },
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                name: "Please enter your name",
                email: "Please enter a valid email address",
                password: "Password must be at least 6 characters long",
                password_confirmation: "Passwords do not match"
            }
        });
    });
</script>
@endsection
