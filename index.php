<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        th, tr {
            text-align: center;
        }
    </style>

    <title>Document</title>
</head>
<body>
    <?php 
        require_once "db/connect.php";
        if (isset($_GET['delete'])) {
            if ($_GET['delete'] == 1) { ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Student deleted successfully!
                </div>
            <?php }
        }


        if (isset($_POST['submitBtn'])) {
            $fullname = $_POST['fname'];
            $studentID = $_POST['sID'];
            $studentClass = $_POST['class'];

            if ($_GET['update'] == 1) {
                $id = $_GET['id'];
                $query = "UPDATE `stutbl` SET `fullName`='$fullname',`stuID`='$studentID',`class`='$studentClass' WHERE `ID`=$id";

                if ($conn->query($query)) { ?>
                    <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            Student information updated successfully!
                    </div>
                <?php 
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else if ($_GET['update'] == 0) {
                $query = "INSERT INTO `stutbl`(`fullName`, `stuID`, `class`) VALUES ('$fullname','$studentID','$studentClass')";

                if ($conn->query($query)) { ?>
                    <div class="alert alert-primary alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            Student added successfully!
                    </div>
                <?php 

                }
            };
        }


    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="text-uppercase mt-3">Student list</h1>
                <a href="update.php?update=0" class="btn btn-primary mt-2" role="button">Add student</a>
                <table class="table mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>Full name</th>
                            <th>Student ID</th>
                            <th>Class</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM `stutbl`";
                            $res = $conn->query($query);
                            if ($res->num_rows == 0) {

                            } else {
                                while ($row = $res->fetch_assoc()) { ?>
                                    <tr>
                                        <td> <?php echo $row['fullName']; ?> </td>
                                        <td> <?php echo $row['stuID']; ?> </td>
                                        <td> <?php echo $row['class']; ?> </td>
                                        <td>
                                            <a href="update.php?update=1&id=<?php echo $row['ID']; ?>" class="btn btn-info" role="button">Edit</a>
                                            <a onclick="return confirm('Do you want to delete this student?');" href="delete.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger" role="button">Delete</a>
                                        </td>
                                    </tr>
                                <?php }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>