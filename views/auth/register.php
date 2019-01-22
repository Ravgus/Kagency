<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/template/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

<div class="container">
    <div class="row">
        <?php if (Session::has('error_msg')): ?>
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    <?php echo Session::get('error_msg') ?>
                </div>
            </div>
        <?php endif ?>
        <div class="w-100"></div>
        <div class="col">
            <form class="form-signin" action="/registration/put" method="POST">
                <h1 class="h3 mb-3 font-weight-normal">Please Sign Up</h1>
                <label for="inputName" class="sr-only">Name</label>
                <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
            </form>
        </div>
    </div>
</div>

<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
