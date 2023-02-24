<?php
include_once "./base.php";

if (isset($_POST)) {
    // prr($_POST);
    // echo json_encode($_POST);
    if (isset($_POST['email'])) {
        if (isset($_POST['acc'])) {
            echo $Admin->count(['acc' => $_POST['acc']]);
        } else {
            echo $Admin->count($_POST) == 1 ? "您的密碼為 : " . ($Admin->find($_POST))['pw'] : "查無此資料";
        }
    } else {
        if ($Admin->count(['acc' => $_POST['acc']]) !== 0) {
            if ($Admin->count($_POST) == 1) {
                $_SESSION['login'] = $Admin->find($_POST);
                echo 11;
            } else {
                echo 10;
            }
        } else {
            echo 0;
        }
    }
} else {
    echo 'error';
}
