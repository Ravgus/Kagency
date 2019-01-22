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

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <a role="button" class="my-0 mr-md-auto font-weight-normal btn btn-dark" href="/">KAgency</a>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="btn btn-outline-success" href="/logout">Logout</a>
        </nav>
</div>

<div class="container mb-5">
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <?php if (Session::has('error_msg')): ?>
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        <?php echo Session::get('error_msg') ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <div class="col-6">
        <h2>Categories</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Modify</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($categories as $v): ?>
            <tr>
                <th scope="row"><?=$v['id']?></th>
                <td><?=$v['name']?></td>
                <td>
                    <a role="button" class="btn btn-primary" href="/admin/category/edit/<?=$v['id']?>">Edit</a>
                    <a role="button" class="btn btn-danger" href="/admin/category/delete/<?=$v['id']?>">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a role="button" class="btn btn-primary" href="/admin/category/add/">Add</a>
        </div>
        <div class="col-6">
            <h2>Products</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Count</th>
                    <th scope="col">Modify</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($products as $v): ?>
                <tr>
                    <th scope="row"><?=$v['id']?></th>
                    <td><?=$v['name']?></td>
                    <td><?=$v['description']?></td>
                    <td><?=$v['price']?></td>
                    <td><?=$v['count']?></td>
                    <td>
                        <a role="button" class="btn btn-primary" href="/admin/product/edit/<?=$v['id']?>">Edit</a>
                        <a role="button" class="btn btn-danger" href="/admin/product/delete/<?=$v['id']?>">Remove</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a role="button" class="btn btn-primary" href="/admin/product/add/">Add</a>
        </div>
    </div>
</div>

<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
