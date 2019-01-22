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
                    <label for="name">Product name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?php if (isset($product)) {echo $product['name'];} ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Enter description" value="<?php if (isset($product)) {echo $product['description'];} ?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Enter price" value="<?php if (isset($product)) {echo $product['price'];} ?>" required>
                </div>
                <div class="form-group">
                    <label for="count">Count</label>
                    <input type="text" name="count" class="form-control" id="count" placeholder="Enter count" value="<?php if (isset($product)) {echo $product['count'];} ?>" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select size="1" name="category" class="form-control" id="category" required>
                        <?php foreach ($categories as $category) { ?>

                        <?php echo "<option value='{$category['id']}'>{$category['name']}</option>" ?>

                        <?php } ?>
                    </select>
                </div>
                <input id="prod_id" name="prod_id" type="hidden" value="<?php if (isset($product)) {echo $product['id'];} ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
