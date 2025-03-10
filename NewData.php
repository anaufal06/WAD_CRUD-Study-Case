<?php
include 'config.php';

if(isset($_POST['submit'])) {
    $bookname = $_POST['bookName'];
    $author = $_POST['Author'];
    $year = $_POST['Year'];
    
    $sql = "INSERT INTO product (bookName, Author, Year) VALUES ('$bookname', '$author', '$year')";
    
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
    <title>Tambah Data</title>
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
                            Add Data
                        </h4>
                    </div>
                    <div class="card-body cbody">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Book Name</label>
                                <input type="text" name="bookName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" name="Author" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="Year" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn button123">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>