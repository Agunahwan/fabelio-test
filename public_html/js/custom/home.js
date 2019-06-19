$(document).ready(function() {
  $("#add_product").click(function() {
    get_page();
  });
});

function get_page() {
  var page = $("#path_product")
    .val()
    .replace(/\//g, "|");

  $.ajax({
    url: local + "/product/getcurl/" + page,
    cache: false,
    type: "GET",
    dataType: "json",
    success: function(data, textStatus, jQxhr) {
      if (data != null) {
        var productId = $(
          '#product_addtocart_form input[name="product"]',
          data.page
        ).val();
        console.log(productId);
        if (productId != null) {
          window.location.href = local + "/product/detail_product/" + productId;
        }
      }
    },
    error: function(jqXhr, textStatus, errorThrown) {
      console.log(errorThrown);
    }
  });
}
