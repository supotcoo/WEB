<?php
$id = $_GET['id'];
echo $id;
$doc = new DOMDocument();
$doc->load('data/products.xml');
$products = $doc->getElementsByTagName('products')->item(0);
$product = $products->getElementsByTagName('product');
$product1 = $products->getElementsByTagName('product');
$oldname = $product1->item($id-1)->getElementsByTagName('name')->item(0)->nodeValue;
$oldprice = $product1->item($id-1)->getElementsByTagName('price')->item(0)->nodeValue;
$olddescr = $product1->item($id-1)->getElementsByTagName('description')->item(0)->nodeValue;
if (isset($_POST['submit'])){
    $the_name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $newprod = $doc->createElement('product');
    $new_id = $doc->createElement('id', $id);
    $newprod->appendChild($new_id);
    if (!empty($the_name)){
        $new_name = $doc->createElement('name', $the_name);
    }
    else{
        $new_name = $doc->createElement('name', $oldname);
    }
    $newprod->appendChild($new_name);

    if (!empty($price)){
        $new_price = $doc->createElement('price', $price);
    }
    else{
        $new_price = $doc->createElement('price', $oldprice);
    }
    $newprod->appendChild($new_price);
    if (!empty($description)){
        $new_descr = $doc->createElement('description', $description);
    }
    else{
        $new_descr = $doc->createElement('description', $olddescr);
    }
    $newprod->appendChild($new_descr);

    $cnt = 0;

    while (is_object($product->item($cnt++))){
        $tmp = $product->item($cnt-1)->getElementsByTagName('id')->item(0);
        $tmpid = $tmp->nodeValue;
        if ($tmpid == $id){
            $products->replaceChild($newprod, $product -> item($cnt - 1));
            break;
        }
    }
    $doc->formatOutput = true;
    $doc->save('data/products.xml') or die ('Error');
    header('location:/web_lab4/index.php?page=list');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">List products</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add New</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-lg-6 m-auto">
        <form method="post"><br><br>
            <div class="card">
                <div class="card-header bg-warning">
                    <h1 class="text-white text-center">  Update Member </h1>
                </div><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control" required "> <br>
                <label> NAME: </label>
                <input type="text" name="name" value="<?php echo $oldname; ?>" class="form-control" required "> <br>
                <label> PRICE: </label>
                <input type="number" name="price" value="<?php echo $oldprice; ?>" class="form-control" required "> <br>
                <label> DESCRIPTION: </label>
                <input type="text" name="description" value="<?php echo $olddescr; ?>" class="form-control"> <br>
                <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php?page=list"> Cancel </a><br>
            </div>
        </form>
    </div>
</body>
</html>