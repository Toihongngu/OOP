<!DOCTYPE html>
<html lang="en">

<head>
    <title>How To Create</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        a {
            text-decoration: none;
        }

        .login-page {
            width: 100%;
            height: 100vh;
            display: inline-block;
            display: flex;
            align-items: center;
        }

        .form-right i {
            font-size: 100px;
        }
    </style>
</head>

<body>

    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="mb-3">Login Now</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                    <i class="bi bi-bootstrap"></i>
                                    <h2 class="fs-1">Create a new account here !</h2>
                                    @if (!empty($_SESSION['errors']))
                                    <div class="alert alert-warning">
                                        <ul>
                                            @foreach ($_SESSION['errors'] as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                
                                        @php
                                            unset($_SESSION['errors']);
                                        @endphp
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form action="{{ url('handle-register') }}"  enctype="multipart/form-data"  method="POST" class="row g-4">
                                        <div class="col-12">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" class="form-control" placeholder="Enter Username"  name="name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                                <input type="email" class="form-control" placeholder="Enter Email"  name="email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="text" class="form-control" placeholder="Enter Password"  name="password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Confirm Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="text" class="form-control" placeholder="Enter Confirm Password" name="confirm_password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Avatar<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-circle"></i></div>
                                                <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
                                            </div>
                                        </div>                                  
                                        <div class="col-sm-6">
                                            <a href="#" class="float-end text-primary">You already have an account?</a>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-primary px-4 float-end mt-4">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <p class="text-end text-secondary mt-3">E Shop Login Welcome</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->

</body>

</html>
