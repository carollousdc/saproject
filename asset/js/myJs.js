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

$('input[name="name"]').on('input', function() {
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
  $(".select2-purple").select2();
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

 $('#form-submit').on('submit', function(e){
	e.preventDefault();
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'success',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, create it!'
	  }).then((result) => {
		if (result.isConfirmed) {
			var data = $("#form-submit").serialize();
		$.ajax({
			type: "POST",
			url: link + "/tambahData",
			data: data,
			success: function (response) {
				Swal.fire(
					'Created!',
					'Your file has been created.',
					'success'
				  )
				  $('#form-submit')[0].reset();
				$("#tbl_data").DataTable().ajax.reload(null, false);
        getSidebar();
        $("#modalform").modal('hide');
        if(sumtotal()) sumtotal();
			},
		});
		}
	  })
   });

   $("#reset").click(function () {
		$.ajax({
			type: "POST",
			url: link + "/reset",
			success: function (response) {
        $("#tbl_data").DataTable().ajax.reload(null, false);
        $('#sumtotal').val("");
        $('#customer').val("");
        $('#cash').val("");
			},
		});
	});
   
	$("#pembayaran").click(function () {
		var data = $("#form-submit").serialize();
		if($("#customer").val() == ""){
			showMsg("Wajib masukkan nama customer.");
			$("html, body").animate({ scrollTop: 0 }, "slow");
		} else {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, create it!'
        }).then((result) => {
        if (result.isConfirmed) {
          $('#sumtotal').val("");
          $('#tax').val("");
          var data = $("#form-submit").serialize();
          $.ajax({
            type: "POST",
            url: link + "/updateData",
            data: data,
            success: function (response) {
              $('#cash').val("");
              $('#customer').val("");
              $("#tbl_data").DataTable().ajax.reload(null, false);
              $('#form-submit').reset();
            },
          });
        }
        })
		}
	});
   
   $("#tbl_data").on("click", ".btn_hapus", function () {
    var id = $(this).attr("data-id");
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: link + "/hapusData",
          type: "POST",
          data: { id: id },
          success: function (response) {
            Swal.fire(
              'Deleted!',
              'The item has been deleted.',
              'success'
              )
            $("#tbl_data").DataTable().ajax.reload(null, false);
          },
        });
      }
      })
  });

  $("#tbl_data").on("click", ".btn_hapus_detail", function () {
    var id = $(this).attr("data-id");
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: link + "/hapusDataDetail",
          type: "POST",
          data: { id: id },
          success: function (response) {
            Swal.fire(
              'Deleted!',
              'The item has been deleted.',
              'success'
              )
            $("#tbl_data").DataTable().ajax.reload(null, false);
            $('#sumtotal').val("");
          },
        });
      }
      })
  });

  $("#tbl_data").on("click", ".btn_edit", function () {
		var id = $(this).attr("data-id");
		$.ajax({
			url: link + "/ambilDataById",
			type: "POST",
			data: { id: id },
			dataType: "json",
			success: function (response) {
				$("#editModal").modal("show");
				for(var i = 0; i <= response.key_count; i++){
					dummyval = response.key[i];
					if(dummyval == 'promo'){
						$('#promo_edit').val(response.data[dummyval]).trigger('change');
					} else $('input[name="'+response.key[i]+'_edit"]').val(response.data[dummyval]);
				}
				$("#tbl_data").DataTable().ajax.reload(null, false);
			},
		});
  });
  
  $("#btn_update_data").on("click", function () {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
      }).then((result) => {
      if (result.isConfirmed) {
        var data = $("#form-edit").serialize();
        $.ajax({
          url: link + "/perbaruiData",
          type: "POST",
          data: data,
          success: function (response) {
            console.log(response);
            $('#form-edit')[0].reset();
            $("#editModal").modal("hide");
            $("#tbl_data").DataTable().ajax.reload(null, false);
          },
        });
      }
      })
	});

function showDataTable() {
  var table;
	$(document).ready(function () {
		var link = $(location).attr("pathname");
		//datatables
		table = $("#tbl_data").DataTable({
			responsive: true,
			serverSide: true,
			autoWidth: false,
			sScrollY: "500",
			sScrollX: "100%",
			bSort: true,
			iDisplayLength: 10,
			bLengthChange: false,
			order: [],
			ajax: {
				url: link + "/get_data",
				type: "POST",
			},
			columnDefs: [
				{
					targets: [0, 3],
					orderable: false,
				},
				{
					targets: -1,
					autoWidth: true,
					orderable: false,
				},
			],
		});
  });
$("#searchbox").on("keyup search input paste cut", function() {
	table.search(this.value).draw();
 }); 
};

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
