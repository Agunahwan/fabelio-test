<?php
include_once 'library.php';

$page = "https://fabelio.com/ip/" . $_GET["page"] . ".html";
$response = get_web_page($page);
$data = array(
    'page' => $response,
);
echo json_encode($data);
