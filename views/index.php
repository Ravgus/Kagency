<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Main</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
</head>

<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <a role="button" class="my-0 mr-md-auto font-weight-normal btn btn-dark" href="/">KAgency</a>
    <?php if (Session::has('auth') && Session::get('auth') == true): ?>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="btn btn-outline-success" href="/admin">Admin</a>
        </nav>
    <?php else: ?>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="btn btn-outline-primary" href="/login">Sign in</a>
        <a class="btn btn-outline-success" href="/registration">Sign up</a>
    </nav>
    <?php endif ?>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="h1">Welcome!!!</div>
    </div>
</div>

<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
