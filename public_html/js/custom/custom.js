// Spinner
function showModalSpinner(message) {
    $("#spin-message").html(message);
    $('.modalSpinner').modal('show');
}

function hideModalSpinner() {
    $('.modalSpinner').modal('hide');
}

function dcmFormatter(myElement) {
  //var formatNumber = number.toLocaleString('en', { maximumSignificantDigits: 3 })
  //return formatNumber
  if (myElement != null) {
    var myVal = ""; // The number part
    var myDec = ""; // The digits pars

    // Splitting the value in parts using a dot as decimal separator
    var parts = myElement.toString().split(".");

    // Filtering out the trash!
    parts[0] = parts[0].replace(/[^0-9]/g, "");

    // Setting up the decimal part
    if (!parts[1] && myElement.toString().indexOf(".") > 1) {
      myDec += ".00";
    }
    if (parts[1]) {
      myDec = "." + parts[1];
    }

    // Adding the thousand separator
    while (parts[0].length > 3) {
      myVal =
        "." + parts[0].substr(parts[0].length - 3, parts[0].length) + myVal;
      parts[0] = parts[0].substr(0, parts[0].length - 3);
    }

    return (myElement.value = parts[0] + myVal + myDec);
  } else return "-";
}

function showMessageCommon(title, message, isSuccess) {
  $("#message-title").html(title);
  $("#message-body").html(message);

  if (isSuccess) {
    $("#message-label").attr("class", "alert alert-success");
  } else {
    $("#message-label").attr("class", "alert alert-danger");
  }
  $("#message-common").modal("show");
}

function dialog(message, yesCallback, noCallback) {
  $("#message-confirm-body").html(message);
  var dialog = $("#dialog-confirmation").modal("show");

  $("#btn-yes").click(function() {
    dialog.modal("hide");
    yesCallback();
  });
  $("#btn-no").click(function() {
    dialog.modal("hide");
    noCallback();
  });
}

function goBack() {
  window.history.back();
}