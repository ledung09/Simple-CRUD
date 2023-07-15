<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-uppercase my-4">
            <?php
                require_once "db/connect.php";
                $updateStr = "";
                $idStr = "";
                $fullname = "";
                $studentID = "";
                $studentClass = "";
                if (isset($_GET['update'])) {
                    if ($_GET['update'] == 0) {
                        echo "Add new student";
                        $updateStr = "update=0";
                    } else if ($_GET['update'] == 1) {
                        echo "Update student information";
                        $id = $_GET['id'];
                        $updateStr = "update=1";
                        $idStr = "&id=" . $id;
                        $query = "SELECT * FROM `stutbl` WHERE `ID` = $id";
                        $row = $conn->query($query)->fetch_assoc();
                        $fullname = $row['fullName'];
                        $studentID = $row['stuID'];
                        $studentClass = $row['class'];
                    };
                }
            ?>
        </h1>                
        <div class="row justify-content-center">
            <form class="col-md-4" action="index.php?<?php echo $updateStr . $idStr ?>" method="POST">
                <div class="form-group mb-3">
                    <label for="fname">Full name:</label>
                    <input required type="text" class="form-control" placeholder="Enter full name" id="fname" name="fname" value="<?php echo $fullname?>">
                </div>

                <div class="form-group mb-3">
                    <label for="sID">Student ID:</label>
                    <input required type="text" class="form-control" placeholder="Enter student ID" id="sID" name="sID" value="<?php echo $studentID?>">
                </div>

                <div class="form-group mb-4">
                    <label for="class">Class:</label>
                    <input required type="text" class="form-control" placeholder="Enter class" id="class" name="class" value="<?php echo $studentClass?>">
                </div>

                <button type="submit" class="btn btn-primary btn-block" name="submitBtn">Submit</button>
            </form>
        </div>
    </div>
    <?php
    ?>
    
</body>
</html>