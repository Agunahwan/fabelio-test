$(document).ready(function() {
//   get_all_comment();
});

// function refresh_data(data) {
//   console.log(data[0]);
//   $("#tbl_comment").empty();
//   for (var i = 0; i < data.length; i++) {
//     var data_column =
//       "<tr><td><h2>" +
//       data[i].title +
//       " (" +
//       data[i].created_date +
//       ")</h2></td></tr><tr><td>" +
//       data[i].comment +
//       "</td></tr><tr><td>&nbsp</td></tr>";
//     $("#tbl_comment").append(data_column);
//   }
// }

// function get_all_comment() {
//   var product_id = id;

//   $.ajax({
//     url: local + "/comment/list/" + product_id,
//     type: "GET",
//     dataType: "JSON",
//     success: function(data) {
//       if (data.length > 0) {
//         refresh_data(data);
//       }
//     },
//     error: function(x, y, z) {
//       alert(z);
//     }
//   });
// }

// function add_comment() {
//   var product_id = id;
//   var title = $("#title").val();
//   var comment = $("#comment").val();

//   $.ajax({
//     url: local + "/comment/add",
//     type: "post",
//     data: {
//       product_id: product_id,
//       title: title,
//       comment: comment
//     },
//     dataType: "JSON",
//     success: function(data) {
//       get_all_comment();
//       $("#title").val("");
//       $("#comment").val("");
//     },
//     error: function(x, y, z) {
//       alert(z);
//     }
//   });
// }
