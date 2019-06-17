<?php
include_once 'library.php';

$tipe = $_POST['type'];
$product_id = $_POST['product_id'];

switch ($tipe) {
    case 'get_all_comment':
        $result = get_all_comment($product_id);
        $data = array();

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $data[$i] = $row;
            $i++;
        }

        echo json_encode($data);
        break;
    case 'add_comment':
        $title = $_POST['title'];
        $comment = $_POST['comment'];
        $result = insert_comment($product_id, $title, $comment);
        if ($result) {
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0));
        }
        break;
}
