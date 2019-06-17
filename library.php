<?php
include_once 'connection.php';

function get_web_page($url)
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true, // return web page
        CURLOPT_HEADER => false, // don't return headers
        CURLOPT_FOLLOWLOCATION => true, // follow redirects
        CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
        CURLOPT_ENCODING => "", // handle compressed
        CURLOPT_AUTOREFERER => true, // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120, // time-out on connect
        CURLOPT_TIMEOUT => 120, // time-out on response
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);

    $content = curl_exec($ch);

    curl_close($ch);

    return $content;
}

function get_all_product()
{
    $conn = connect();

    $sql = "SELECT * FROM product ORDER BY updated_date DESC, created_date DESC";

    $result = $conn->query($sql);

    $conn->close();

    return $result;
}

function get_product($id)
{
    $conn = connect();

    $sql = "SELECT * FROM product WHERE id='$id'";

    $result = $conn->query($sql);

    $conn->close();

    return $result->num_rows;
}

function insert_product($id, $name, $price, $description, $image, $url)
{
    $conn = connect();

    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO product (id, name, price, description, image, url, created_date)
        VALUES ('$id', '$name', '$price', '$description', '$image', '$url', '$date')";

    $is_success = $conn->query($sql);

    $conn->close();

    return $is_success;
}

function get_all_comment($product_id)
{
    $conn = connect();

    $sql = "SELECT * FROM comment WHERE product_id='$product_id' ORDER BY created_date DESC";

    $result = $conn->query($sql);

    $conn->close();

    return $result;
}

function insert_comment($product_id, $title, $comment)
{
    $conn = connect();

    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO comment (product_id, title, comment, created_date)
        VALUES ('$product_id', '$title', '$comment', '$date')";

    $is_success = $conn->query($sql);

    $conn->close();

    return $is_success;
}