<?php
include_once "./base.php";

if (isset($_POST)) {
    if (!empty($_POST['title']) && !empty($_POST['options'])) {
        $Que->save(['text' => $_POST['title']]);
        $title = $Que->find(['text' => $_POST['title']]);

        foreach ($_POST['options'] as $option) {
            if (!empty($option)) {
                $Que->save(['text' => $option, 'parent' => $title['id']]);
            }
        };
    }
}

to('../back.php?do=que');
?>