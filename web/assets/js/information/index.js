$(document).ready(function () {
  var event = $("#dataTable-event").DataTable({
    processing: true,
    scrollX: true,
    ajax: {
      url: "../../assets/lib/datareturn.php?i=3",
      type: "GET",
    },
    columns: [
      {
        title: "ลำดับ",
        className: "align-middle",
        data: "id",
      },
      {
        title: "หัวข้อ",
        className: "align-middle",
        data: "title",
      },
      {
        title: "ประเภท",
        className: "align-middle",
        data: "name",
      },
      {
        title: "รายละเอียด",
        className: "align-middle",
        data: "detail",
      },
      {
        title: "จัดการ",
        className: "align-middle ",
        data: null,
        render: function (data, type, row) {
          return `<div class="btn-group" role="group">
                                <a href="form_edit_event.php?id=${data.id}" type="button" class="btn btn-warning">
                                    <i class="far fa-edit"></i> แก้ไข
                                </a>
                                <button type="button" class="btn btn-danger" id="delete" data-id="${data.id}">
                                    <i class="far fa-trash-alt"></i> ลบ
                                </button>
                            </div>`;
        },
      },
    ],
    columnDefs: [
      {
        searchable: false,
        orderable: false,
        targets: 0,
      },
    ],
    // ordering: false,
    order: [[1, "asc"]],
    initComplete: function () {
      $(document).on("click", "#delete", function () {
        let id = $(this).data("id");
        // console.log(id);
        Swal.fire({
          text: "คุณแน่ใจหรือไม่...ที่จะลบรายการนี้?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "ใช่! ลบเลย",
          cancelButtonText: "ยกเลิก",
        }).then((result) => {
          if (result.isConfirmed) {
            $.post("../../assets/lib/datareturn.php", {
              i: 102,
              id: id,
            }).done(function () {
              Swal.fire({
                text: "รายการของคุณถูกลบเรียบร้อย",
                icon: "success",
                confirmButtonText: "ตกลง",
              }).then((result) => {
                location.reload();
              });
            });
          }
        });
      });
    },
    // responsive: {
    //     details: {
    //         display: $.fn.dataTable.Responsive.display.modal( {
    //             header: function ( row ) {
    //                 var data = row.data();
    //                 return data.title;
    //             }
    //         } ),
    //         renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
    //             tableClass: 'table'
    //         } )
    //     }
    // },
    language: {
      lengthMenu: "แสดงข้อมูล _MENU_ แถว",
      zeroRecords: "ไม่พบข้อมูลที่ต้องการ",
      info: "แสดงหน้า _PAGE_ จาก _PAGES_",
      infoEmpty: "ไม่พบข้อมูลที่ต้องการ",
      infoFiltered: "(filtered from _MAX_ total records)",
      search: "ค้นหา",
    },
  });
  // event
  //   .on("order.dt search.dt", function () {
  //     event
  //       .column(0, { search: "applied", order: "applied" })
  //       .nodes()
  //       .each(function (cell, i) {
  //         cell.innerHTML = i + 1;
  //       });
  //   })
  //   .draw();

  // set defualt text package
  $.ajax({
    url: "../../assets/lib/datareturn.php?i=4",
    success: function (result) {
      // console.log(result[0]);
      $("#title_th").val(result[0].text);
      $("#title_eng").val(result[1].text);
      $("#title_ch").val(result[2].text);
      $("#front-size").val(result[0].f_size);
      $("#front-speed").val(result[0].f_speed);
      // $("#link").val(result[0].link);
    },
  });

  $("#submit").on("click", function (e) {
    let text_th = $("#title_th").val();
    let text_eng = $("#title_eng").val();
    let text_ch = $("#title_ch").val();
    let f_size = $("#front-size").val();
    let f_speed = $("#front-speed").val();
    $.post("../../assets/lib/datareturn.php", {
      i: 108,
      text_th: text_th,
      text_eng: text_eng,
      text_ch: text_ch,
      f_size: f_size,
      f_speed: f_speed,
    }).done(function (resp) {
      if (resp.data == "Success") {
        toastr.success("บันทึกข้อมูลเรียบร้อย");
        setTimeout(() => {
          window.location.reload();
        }, 800);
      } else {
        toastr.error("ไม่สามารถบันทึกข้อมูลได้");
      }
    });
  });

  $("#submit_link").on("click", function (e) {
    let link = $("#link").val();
    let minute = $("#minute").val();
    // console.log(minute);
    $.post("../../assets/lib/datareturn.php", {
      i: 123,
      link: link,
      minute: minute
    }).done(function (resp) {
      if (resp.data == "Success") {
        toastr.success("บันทึกข้อมูลเรียบร้อย");
        setTimeout(() => {
          window.location.reload();
        }, 800);
      } else {
        toastr.error("ไม่สามารถบันทึกข้อมูลได้");
      }
    });
  });

  $.ajax({
    url: "../../assets/lib/datareturn.php", 
    type: 'post',
    data: {
        i:125
    },
    success: function(res){
      $('#link').val(res[0].liveURL);
      $('#minute').val(res[0].time_video);
    }
  });
});
