<?php
include_once 'library.php';

$id = $_GET['product_id'];

$page = "https://fabelio.com/insider/data/product/id/" . $id;
$response = get_web_page($page);

$product = json_decode($response)->product;

$name = $product->name;
$price = $product->unit_sale_price;
$description = $product->description;
$image_url = $product->product_image_url;
$url = $product->url;

$row_data = get_product($id);

$result = true;
if ($row_data < 1) {
    $result = insert_product($id, $name, $price, $description, $image_url, $url);
}

if ($result) {
    ?>
<html>

<head>
    <title>Page 3</title>
</head>

<body>
    <?php include 'header_menu.php';?>
    <table width="100%">
        <tr>
            <td>Name</td>
            <td>:</td>
            <td><?=$name?></td>
        </tr>
        <tr>
            <td>Current Price</td>
            <td>:</td>
            <td><?=$price?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>:</td>
            <td><?=$description?></td>
        </tr>
        <tr>
            <td>Product Image</td>
            <td>:</td>
            <td><img src="<?=$image_url?>" alt="<?=$name?>" width="50%" height="50%"></td>
        </tr>
    </table>
    <br />
    <br />
    <table width="75%">
        <tr>
            <td colspan="3">
                <h1>Please leave comment for this product</h1>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Title</h4>
            </td>
            <td>:</td>
            <td><input type="text" id="title" name="title" /></td>
        </tr>
        <tr>
            <td>
                <h4>Comment</h4>
            </td>
            <td>:</td>
            <td><textarea id="comment" name="comment" rows="5" cols="50"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button id="submit_comment">Submit Comment</button></td>
        </tr>
    </table>
    <br />
    <table id="tbl_comment" width="100%">
    </table>

    <script src='./js/jquery.js'></script>

    <script>
    $(document).ready(function() {
        get_all_comment();

        $("#submit_comment").click(function() {
            add_comment();
        });
    });

    function refresh_data(data) {
        console.log(data[0]);
        $("#tbl_comment tr").remove();
        for (var i = 0; i < data.length; i++) {
            var data_column = '<tr><td><h2>' + data[i].title +
                ' (' + data[i].created_date + ')</h2></td></tr><tr><td>' + data[i].comment +
                '</td></tr><tr><td>&nbsp</td></tr>';
            $('#tbl_comment').append(data_column);
        }
    }

    function get_all_comment() {
        var product_id = <?=$id?>;

        $.ajax({
            url: "./comment.php",
            type: "post",
            data: {
                'type': 'get_all_comment',
                'product_id': product_id
            },
            dataType: "JSON",
            success: function(data) {
                if (data.length > 0) {
                    refresh_data(data);
                }
            },
            error: function(x, y, z) {
                alert(z);
            }
        });
    }

    function add_comment() {
        var product_id = <?=$id?>;
        var title = $("#title").val();
        var comment = $("#comment").val();

        $.ajax({
            url: "./comment.php",
            type: "post",
            data: {
                'type': 'add_comment',
                'product_id': product_id,
                'title': title,
                'comment': comment
            },
            dataType: "JSON",
            success: function(data) {
                get_all_comment();
                $("#title").val('');
                $("#comment").val('');
            },
            error: function(x, y, z) {
                alert(z);
            }
        });
    }
    </script>
</body>

</html>
<?php
}
?>