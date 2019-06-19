var masterDataTable;

$(document).ready(function() {
  setDataTables();
});

function setDataTables() {
  masterDataTable = $("#tableData").DataTable({
    ajax: {
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      type: "GET",
      url: local + "/product/list",
      dataSrc: function(json) {
        var return_data = new Array();
        for (var i = 0; i < json.length; i++) {
          return_data.push({
            no: i + 1,
            detail:
              '<a href="' +
              local +
              "/product/detail_product/" +
              json[i].id +
              '">' +
              json[i].name +
              "</a>",
            name: json[i].name,
            price: json[i].price,
            description: json[i].description
          });
        }
        return return_data;
      }
    },
    language: {
      emptyTable: "There are no Product at present.",
      zeroRecords: "There were no matching Product found."
    },
    ordering: false,
    paging: true,
    columns: [
      {
        data: "no",
        title: "No."
      },
      {
        data: "name",
        title: "Name"
      },
      {
        data: "price",
        title: "Current Price"
      },
      {
        data: "description",
        title: "Description"
      },
      {
        data: "detail",
        title: "Detail Product"
      }
    ],
    columnDefs: [
      {
        targets: 0, // your case first column
        className: "text-center",
        width: "5%"
      },
      {
        targets: [1, 2, 4], // your case first column
        className: "text-center",
        width: "10%"
      }
    ]
  });
}
