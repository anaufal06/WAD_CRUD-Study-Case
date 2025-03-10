<?php
include 'config.php';

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$index = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header">
                        <h4 class="mainhead">
                            <a href="NewData.php" class="btn button123 float-right">Add Data</a>
                            Data Book
                        </h4>
                    </div>
                    <div class="card-body cbody">
                        <table class="table table123 table-bordered ">
                            <thead>
                                <tr class="row1">
                                    <th>ID</th>
                                    <th>Book Name</th>
                                    <th>Author</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".($index +1)."</td>";$index++;
                                        echo "<td>".$row['bookName']."</td>";
                                        echo "<td>".$row['author']."</td>";
                                        echo "<td>".$row['year']."</td>";
                                        echo "<td>
                                            <a href='edit.php?idBook=".$row['idBook']."' class='btn btn-sm btn-primary'>Edit</a>
                                            <a href='delete.php?idBook=".$row['idBook']."' class='btn btn-sm btn-danger' onclick='return confirm(\"Confirm delete " .addslashes($row['bookName'])."?\")'>Delete</a>
                                        </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>None Data Exist</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>