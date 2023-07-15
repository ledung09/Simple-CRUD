<?php
    require_once "db/connect.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];     
        $stmt = $conn->prepare("DELETE FROM `stutbl` WHERE `ID` = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php?delete=1");
    }
?>