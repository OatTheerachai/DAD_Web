$(document).ready(function () {
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
    const id = GetURLParameter('id');
    // console.log(id);
    $.post("../../assets/lib/datareturn.php", {
        i: 118,
        // id: id
    }).done(function(resp) {
        // let i;
        for(let i =0; i< resp.length; i++) {
            $("#theme").append(`<option data-img-src="${resp[i].path}" width="200" height="200" value=${resp[i].id}></option>`)
        }
        $("#theme").imagepicker();
});

//set default theme
$.ajax({
    url: '../../assets/lib/datareturn.php',
    type: 'post',
    data: {
        i: 119,
        id: id
    },
    dataType: 'json',
    success: function(response){
        // console.log(response[0].t_id);
        $("#theme").val(response[0].t_id);
        $("#theme").data('picker').sync_picker_with_select();
    }
});

$('#submit_theme').on('click', function (e) {   
    //   console.log($("#theme").val());
        $.post("../../assets/lib/datareturn.php", {
            i: 121,
            id: id,
            t_id: $("#theme").val(),
        }).done(function(resp) {
            if(resp.data == "Success"){
                toastr.success('บันทึกข้อมูลเรียบร้อย')
                setTimeout(() => {
                  window.location.href = '../config'
                }, 800);
            }
            else {
                toastr.error('ไม่สามารถบันทึกข้อมูลได้');
            }
    });
});
});
  