<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
</head>

<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col">
            <form action="<?php echo $path; ?>" method="post">
                <div class="form-group">
                    <label for="name">Category name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?php if (isset($category)) {echo $category['name'];} ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
