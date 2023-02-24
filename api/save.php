<?php
include_once "./base.php";

if (isset($_POST)) {
    prr($_POST);
    $table = $_POST['table'];
    unset($_POST['table']);
    $stable = lcfirst($table);

    if (isset($_POST['id'])) {
        foreach ($_POST['id'] as $id) {
            $date = $$table->find($id);
            if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
                $$table->del($id);
            }
            if (isset($_POST['sh'])) {
                $date['sh'] = in_array($id, $_POST['sh']) ? 1 : 0;
            }
            $$table->save($date);
        }
    } else {
        if (isset($_POST['from'])) {
            $from = $_POST['from'];
            unset($_POST['from']);
            echo $from;
            to("../$from.php?do=admin");
            $$table->save($_POST);
        }
    }
    // prr($_POST);
}
