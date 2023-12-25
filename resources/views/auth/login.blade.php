<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/auth.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body {
        background: url("{{ asset('assets/coffee2.jpg') }}") no-repeat center center fixed;
    }
</style>

<body>
    <div class="card-login">
        <img src="{{ asset('assets/login3.png') }}" alt="login" class="loginImage">
        <div class="login">
            <form class="row g-3" method="post" action="{{ route('auth.loginValidation') }}" >
              @csrf
                <h4>ADMIN LOGIN</h4>
                <div class="mb-2">
                    <label for="formGroupExampleInput" class="form-label">Username</label>
                    <input type="text" class="form-control @error('error') is-invalid @enderror"  id="formGroupExampleInput" name="username"   placeholder="Username" required>
                    <div class="invalid-login">
                        @error('error')
                        {{ $message="masukan data yang benar!" }}
                    @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control @error('error') is-invalid @enderror"  name="password" placeholder="password" required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-eye" id="togglePassword"><img src="assets/icon/eye-buka.png" width="15px" height="15px" alt=""></i>
                            </span>
                        </div>
                    </div>
                    <div class="invalid-login">
                        @error('error')
                        {{ $message="masukan data yang benar!" }}
                    @enderror
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="js/login.js"></script>
</body>

</html>
