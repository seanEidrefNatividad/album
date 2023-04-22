<?php

function emptyInput_functions($username, $password) {
    $result = false;
    if(empty($username) || empty($password)) {
        $result = true;
    } 

    return $result;
};
function login_emptyInput_functions($username, $password) {
    $result = false;
    if(empty($username) || empty($password)) {
        $result = true;
    } 

    return $result;
};
function usernameTaken_functions($conn, $username) {
    if($row = mysqli_fetch_assoc(usernameTaken_Model($conn, $username))) {
        return $row;
    } else {
        return false;
    };

};

function create_functions($username, $password, $conn) {
    create_Model($username, $password, $conn);
    header("location: ../view/register.php?error=none");
};

function login_functions($username, $password, $conn) {
    $userExist = usernameTaken_functions($conn, $username);

    if (!$userExist) {
        header("location: ../view/login.php?error=notExist");
        exit();
    }

    $pwdHashed = $userExist["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    //$match = $pwdHashed === $hashedPwd ? true : false;

    if ($checkPwd === false) {
        header("location: ../view/login.php?error=wrongLogin");
        exit();
    } else {
        session_start();
        $_SESSION["id"] = $userExist["id"];
        $_SESSION["username"] = $userExist["username"];
        header("location: ../view/index.php");
        exit();
    }
}

?>