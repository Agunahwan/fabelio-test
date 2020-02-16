$(document).ready(function() {
  //   get_all_comment();
});

function vote(comment_id, isUp) {
  console.log(local + "/vote/add/" + comment_id + "/" + isUp);
  $.ajax({
    url: local + "/vote/add/" + comment_id + "/" + isUp,
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      console.log(data);
      if (data == true) {
        refresh_data(comment_id);
      }
    },
    error: function(x, y, z) {
      alert(z);
    }
  });
}

function refresh_data(comment_id) {
  $.ajax({
    url: local + "/vote/getvote/" + comment_id,
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      console.log(data);
      if (data.length > 0) {
        $("#voteUp" + comment_id).addClass("disable-thumbs");
        $("#voteDown" + comment_id).addClass("disable-thumbs");
        $("#voteUp" + comment_id).text(" " + data[0].Up);
        $("#voteDown" + comment_id).text(" " + data[0].Down);
      }
    },
    error: function(x, y, z) {
      alert(z);
    }
  });
}

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
