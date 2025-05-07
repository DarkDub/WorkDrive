<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/client-style/login.css') }}" />
    <script defer src="{{ asset('js/client-js/login.js') }}"></script>
</head>

<body>
    <x-header></x-header>

    <div class="login-content">

        <div class="login-container">
            <h4 class="fw-semibold mb-1">Inicie sesión en su cuenta</h4>
            <p class="text-muted mb-3">
                No tiene cuenta? <a href="#" class="text-success fw-semibold">Crear</a>
            </p>



            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" />
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="password" class="form-label">Password</label>
                        <a href="#" class="forgot-link text-secondary">Forgot password?</a>
                    </div>
                    <div class="password-container">
                        <input type="password" class="form-control" id="password" placeholder="8+ characters" />
                        <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-2"
                            id="togglePassword" style="cursor: pointer;"></i>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark w-100">Sign in</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
