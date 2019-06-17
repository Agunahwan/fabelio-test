<?php
include_once 'library.php';

$result = get_all_product();

if ($result->num_rows > 0) {
    ?>
<html>

<head>
    <title>Page 3</title>
</head>

<body>
    <?php include 'header_menu.php';?>
    <table width="100%" border="1">
        <tr>
            <th>Name</th>
            <th>Current Price</th>
            <th>Description</th>
            <th>Detail Product</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td width="10%" align="center"><?=$row['name']?></td>
            <td width="10%" align="center"><?=$row['price']?></td>
            <td><?=$row['description']?></td>
            <td width="15%" align="center"><a href="./detail_product.php?product_id=<?=$row['id']?>"><?=$row['name']?></a></td>
        </tr>
        <?php
        }
        ?>
    </table>

    <script src='./js/jquery.js'></script>

    <script>
    $(document).ready(function() {});
    </script>
</body>

</html>
<?php
}
?>