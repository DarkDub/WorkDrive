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

    <style>
        #header {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin: auto;
        }

        #header #title {
            font-size: 1.5rem;
        }

        #header a {
            font-weight: 100;
            font-size: 1.1rem;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light  px-4 py-3" id="header">
        <a class="navbar-brand fw-bold" id="title" href="#">WorkDrive</a>

        <div class="nav-left">
            <a class="navbar-brand fw-300" href="#">sobre nosotros</a>
            <a class="navbar-brand fw-300" href="#">contactanos</a>

        </div>


    </header>
