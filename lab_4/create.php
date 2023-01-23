<?php
$doc = new DOMDocument();
$doc->load('data/products.xml');
$products = $doc->getElementsByTagName('products')->item(0);
$product = $products->getElementsByTagName('product');
$ind = $product->length;
$id = $product[$ind - 1]->getElementsByTagName('id')->item(0)->nodeValue+1;
if(isset($_POST['submit'])){
    $the_name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $newprod = $doc->createElement('product');
    $new_id = $doc->createElement('id', $id);
    $newprod->appendChild($new_id);
    $new_name = $doc->createElement('name', $the_name);
    $newprod->appendChild($new_name);
    $new_price = $doc->createElement('price', $price);
    $newprod->appendChild($new_price);
    $new_descr = $doc->createElement('description', $description);
    $newprod->appendChild($new_descr);
    $products->appendChild($newprod);
    $doc->formatOutput = true;
    $doc->save('data/products.xml') or die ('Death');
    header('location:/web_lab4/index.php?page=list');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>SMTH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">List products</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php"><span style="font-size:larger;">Add New</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-lg-6 m-auto">
        <form method="post"><br><br>
            <div class="card">
 
                <div class="card-header bg-primary">
                    <h1 class="text-white text-center">  Create New Member </h1>
                </div><br>
                <label> NAME: </label>
                <input type="text" name="name" class="form-control" required  "> <br>
                <label> PRICE: </label>
                <input type="number" name="price" class="form-control" required  "> <br>
                <label> DESCRIPTION: </label>
                <input type="text" name="description" class="form-control" required  "> <br>
                <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php?page=list"> Cancel </a><br>

            </div>
        </form>
    </div>
</body>
</html>