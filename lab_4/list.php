<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
$doc = new DOMDocument();
$doc -> load('data/products.xml');
$products = $doc -> getElementsByTagName('products') -> item(0);
?>

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
                        <a type="button" class="btn btn-primary nav-link active" href="index.php?page=create">Add New</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>DESCRIPTION</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $cnt = 0;
                $product = $products -> getElementsByTagName('product');
                while (is_object($product -> item($cnt ++))){
                    ?>
                    <tr>
                        <th><?php echo $cnt?></td>
                        <td><?php echo $product -> item($cnt - 1) -> getElementsByTagName('name') -> item(0) -> nodeValue?></td>
                        <td><?php echo $product -> item($cnt - 1) -> getElementsByTagName('price') -> item(0) -> nodeValue?></td>
                        <td><?php echo $product -> item($cnt - 1) -> getElementsByTagName('description') -> item(0) -> nodeValue?></td>
                        <td>
                            <a class='btn btn-success' href="index.php?page=update&id=<?php echo  $product->item($cnt-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>">Edit</a>
                            <a  class='btn btn-danger' onclick="return confirmation('<?php echo $product->item($cnt-1)->getElementsByTagName('name')->item(0)->nodeValue;?>')" href= "index.php?page=delete&id=<?php echo  $product->item($cnt-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" >Delete</a></td>
                    </tr>
                    <?php } ?>
            </tbody>
            
        </table>
    </div>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>