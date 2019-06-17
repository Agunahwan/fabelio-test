<html>

<head>
    <title>Page 1</title>
</head>

<body>
    <?php include 'header_menu.php';?>

    <h3>Please input url of product with full url or path of html, example : https://fabelio.com/ip/karpet-skandinavia-janne.html or karpet-skandinavia-janne.html</h3>
    Product Link : <input type="text" name="product_link" width="30%" id="product_link" />
    <br /><br />
    <button id="get_product">Get Product</button>

    <script src='./js/jquery.js'></script>

    <script>
    $(document).ready(function() {
        $("#get_product").click(function() {
            get_page();
        });
    });

    function get_page() {
        var page = $("#product_link").val().replace("https://fabelio.com/ip/", "").replace(".html", "");
        console.log(page);

        $.ajax({
            url: "./getcurl.php?page=" + page,
            async: false,
            dataType: "JSON",
            success: function(data) {
                if (data != null) {
                    var productId = $('#product_addtocart_form input[name="product"]', data.page).val();
                    console.log(productId);
                    if (productId != null) {
                        window.location.href = './detail_product.php?product_id=' + productId;
                    }
                }
            },
            error: function(x, y, z) {
                alert(z);
            }
        });
    }
    </script>
</body>

</html>