$(function () {
    'use strict'

    function  GetURLParameter(sParam){
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++)
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam)
            {
                return decodeURIComponent(sParameterName[1]);
            }
        }
    }
    const id = GetURLParameter('log');
    const name = GetURLParameter('name');
    $(".name").append(name);
    // console.log(name);
    var history = $("#dataTable-event").DataTable({
        processing: true,
        ajax: {
          url: "../../assets/lib/datareturn.php",
          type: "POST",
          data: {
            i:128,
            id: id
          },
        },
        columns: [
        //   {
        //     title: "ลำดับ",
        //     className: "align-middle",
        //     data: null,
        //   },
          {
            title: "Name",
            className: "align-middle",
            data: "name",
          },
          {
            title: "Time",
            className: "align-middle ",
            data: "timestamp",
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

})
    