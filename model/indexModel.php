<?php

function addImage($conn, $albumId, $userId, $imgTitle, $imgDesc, $imgFullName) {
    $sql = "INSERT INTO `image` (albumId, userId, title, description, name) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../view/index.php?album=".$albumId."error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iisss", $albumId, $userId, $imgTitle, $imgDesc, $imgFullName);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function imageCount($conn, $albumId, $userId) {
    $sql = "SELECT * FROM `image` WHERE `albumId` = ? && `userId` = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../view/index.php".$_GET["album"]."error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ii", $albumId, $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $rowCount = mysqli_num_rows($result);
    mysqli_stmt_close($stmt);

    return $rowCount;
}

function albumShow_Model($conn, $userId) {
    $sql = "SELECT * FROM `album` WHERE `userId` = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../view/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function imageShow_Model($conn, $userId, $albumId) {
    $sql = "SELECT * FROM `image` WHERE `userId` = ? && `albumId` = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../view/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ii", $userId, $albumId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function albumTaken_Model($conn, $album_title, $userId) {
    $sql = "SELECT * FROM `album` WHERE `title` = ? && `userId` = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../view/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $album_title, $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function album_create_Model($userId, $album_title, $conn) {
    $sql = "INSERT INTO album (title, userId) VALUES (?,?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../view/index.php?error=createFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $album_title, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../view/index.php?error=none");

};


?>