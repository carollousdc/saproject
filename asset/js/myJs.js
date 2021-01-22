var url = window.location.pathname;
var parts = url.split("/");
var link = parts[parts.length-1];

getSidebar();

function getSidebar() {
  $.ajax({
    url: link + "/getSidebar",
    type: 'POST',
    dataType: 'json',
    success: function (response) {
      $("#nav").html(response.data);
      $("#title").text(response.title);
      getLink();
    },
  });
};

$("input").on('input', function() {
  validateName($(this).val());
});

function validateName(name) {
  $.ajax({
    url: link + "/validateName",
    type: 'POST',
    data: {
      name:name,
    },
    dataType: 'json',
    success: function (response) {
      if(response.length != 0){
        showMsg('Nama yang anda gunakan sudah ada.', 0);
      }
    },
  });
};

function getLink() {
  $.ajax({
    url: link + "/getRootLink",
    type: 'POST',
    dataType: 'json',
    success: function (result) {
      $("#nav")
		.find("#" + link)
		.each(function () {
			$(this).addClass("nav-link active", $(this).attr("href") == url);
		});
	$("#nav")
		.find("#" + result.data)
		.each(function () {
			$(this).addClass("nav-link active", $(this).attr("href") == url);
		});
	$("#nav")
		.find("#" + result.data + "1")
		.each(function () {
			$(this).addClass(
				"nav-item has-treeview menu-open",
				$(this).attr("href") == url
			);
		});
    }
  });
};


$(function () {
  //Initialize Select2 Elements
  $(".select2-purple").select2();
  //Initialize Select2 Elements
  $(".select2bs4").select2({
    theme: "bootstrap4",
  });
});

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("viewModal");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


function showMsg(msg, tipe_msg) {
  var msg_tipe = "alert-danger";
  var msg_name = "Error";
  switch (tipe_msg) {
    case 1:
      msg_tipe = "alert-primary";
      msg_name = "Info";
      break;

    default:
      break;
  }
  $msg_view =
    `<div class="alert ` +
    msg_tipe +
    ` alert-dismissible fade show" role="alert">
            <strong>` +
    msg_name +
    `:</strong><br/>` +
    msg +
    `<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>`;
  $("#pesan").append($msg_view);
}

// var oldXHR = window.XMLHttpRequest;

// function newXHR() {
//     var realXHR = new oldXHR();
//     realXHR.addEventListener("readystatechange", function() {
//         if(realXHR.readyState==3){
//           alert('masuk');
//         }
//     }, false);
//     return realXHR;
// }
// window.XMLHttpRequest = newXHR;