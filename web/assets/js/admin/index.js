$(function () {
    'use strict'
    
    var Log = $("#dataTable-history").DataTable({
        processing: true,
        ajax: {
          url: "../../assets/lib/datareturn.php",
          type: "POST",
          data: {
            i:127
          },
        },
        columns: [
          {
            title: "ลำดับ",
            className: "align-middle",
            data: "user_id",
          },
          {
            title: "Name",
            className: "align-middle",
            data: "user",
          },
          {
            title: "History",
            className: "align-middle ",
            data: null,
            render: function (data, type, row) {
              return `<div class="btn-group" role="group">
                        <a href="history.php?name=${data.user}&log=${data.user_id}" type="button" class="btn btn-primary">
                        <i class="fas fa-info-circle"></i> Details
                        </a>
                      </div>`;
              // console.log(data);
            //   var name = [];
            //   var time = [];
            //   var i =0;
            //   data.forEach(function(item) {
            //     name[i] = item.name;
            //     time[i] = item.timestamp;
            //     i++;
            // });
            // var json_string = JSON.stringify(json_data.data);
            // var json_string = JSON.parse(json_data.data);
            // console.log(json_string);
              // return '<button class="btn btn-primary" data-toggle="modal" data-name ="' + name + '"data-time ="' + time +
              //               '" data-title="' + row.timestamp + '" data-fieldname="' + data + 
              //               '" data-target="#myModal">Details</button>';
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
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return data.title;
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },
        language: {
          lengthMenu: "แสดงข้อมูล _MENU_ แถว",
          zeroRecords: "ไม่พบข้อมูลที่ต้องการ",
          info: "แสดงหน้า _PAGE_ จาก _PAGES_",
          infoEmpty: "ไม่พบข้อมูลที่ต้องการ",
          infoFiltered: "(filtered from _MAX_ total records)",
          search: "ค้นหา",
        },
      });

      var agency = $("#dataTable-agency").DataTable({
        processing: true,
        scrollX: true,
        ajax: {
          url: "../../assets/lib/datareturn.php",
          type: "POST",
          data: {
            i:129
          },
        },
        columns: [
          {
            title: "ลำดับ",
            className: "align-middle",
            data: "id",
          },
          {
            title: "อาคาร",
            className: "align-middle",
            data: "bd_name",
          },
          {
            title: "ชั้น",
            className: "align-middle ",
            data: "floor",
          },
          {
            title: "ประเภท",
            className: "align-middle ",
            data: "cat_name",
          },
          {
            title: "รหัสพื้นที่",
            className: "align-middle ",
            data: "code_place",
          },
          {
            title: "ชื่อผู้เช่า",
            className: "align-middle ",
            data: "owner",
          },
          {
            title: "ชื่อสถานที่",
            className: "align-middle ",
            data: "name",
          },
          {
            title: "รายละเอียด",
            className: "align-middle ",
            data: "detail",
          },
          {
            title: "ชื่อรูป",
            className: "align-middle ",
            data: "logo",
            "defaultContent": "-"
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
        language: {
          lengthMenu: "แสดงข้อมูล _MENU_ แถว",
          zeroRecords: "ไม่พบข้อมูลที่ต้องการ",
          info: "แสดงหน้า _PAGE_ จาก _PAGES_",
          infoEmpty: "ไม่พบข้อมูลที่ต้องการ",
          infoFiltered: "(filtered from _MAX_ total records)",
          search: "ค้นหา",
        },
      });

      // Log
      // .on("order.dt search.dt", function () {
      //   Log
      //     .column(0, { search: "applied", order: "applied" })
      //     .nodes()
      //     .each(function (cell, i) {
      //       cell.innerHTML = i + 1;
      //     });
      // })
      // .draw();

      // $("#myModal").on('show.bs.modal', function (e) {
      //   let triggerLink = $(e.relatedTarget);
      //   let name = triggerLink[0].dataset['name'];
      //   let time = triggerLink[0].dataset['time'];
      //   let Name_arr = name.split(',');
      //   let Time_arr = time.split(',');
      // var table = `<table class="table table-striped">
      //               <thead>
      //                 <tr>
      //                   <th>History</th>
      //                   <th>Time</th>
      //                 </tr>
      //               </thead>
      //             <tbody>`;
        // arr.forEach(function(item) {
        //   console.log(item);
        //   td += "<tr>" + "<td>" +  "</td>" + item.name + "<td>" + item.timestamp + "</td>" + "</tr>";
        // });
        // $("#modalTitle").text(arr[0]);
        // $(this).find(".modal-body").html(table + td + "</tbody></table>");
    // });
})
    