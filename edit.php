<?php
include 'config.php';

if(isset($_GET['idBook']) && !empty($_GET['idBook'])) {
    $idBook = $_GET['idBook'];

    $sql = "SELECT * FROM product WHERE idBook = $idBook";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bookname = $row['bookName'];
        $author = $row['author'];
        $year = $row['year'];
    } else {
        header("Location: index.php");
        exit();
    }
}

if(isset($_POST['submit'])) {
    $idBook = $_POST['idBook'];
    $bookname = $_POST['bookName'];
    $author = $_POST['author']; 
    $year = $_POST['year'];
    
    $sql = "UPDATE product SET bookName = '$bookname', Author = '$author', Year = '$year' WHERE idBook = $idBook";
    
    if($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Table</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mainhead">
                            <a href="index.php" class="btn button123 float-right">Back</a>
                            Edit Data Table
                        </h4>
                    </div>
                    <div class="card-body cbody">
                        <form action="" method="POST">
                            <input type="hidden" name="idBook" value="<?= $idBook; ?>">
                            <div class="form-group">
                                <label>Book Name</label>
                                <input type="text" name="bookName" value="<?= $bookname; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" name="author" value="<?= $author; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="year" value="<?= $year; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn button123">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
