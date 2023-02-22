<?php
include_once "./base.php";

if (isset($_POST)) {
    prr($_POST);
    echo json_encode($_POST);

} else {
    echo 'error';
}
