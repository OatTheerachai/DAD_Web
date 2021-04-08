    // $("select").imagepicker();

    $.post("../../assets/lib/datareturn.php", {
        i: 118,
    }).done(function(resp) {
        // let i;
        for(let i =0; i< resp.length; i++) {
            $("#theme").append(`<option data-img-src="${resp[i].path}" width="200" height="200" value=${resp[i].id}></option>`)
        }
        $("#theme").imagepicker();
        
});

    Dropzone.autoDiscover = false;
    var Themedropzone = new Dropzone('#mydropzone', {
        url: '../../assets/lib/datareturn.php',
        params: {
            i:117
        },
        paramName: "theme",
        autoProcessQueue: false,
        parallelUploads: 10,
        uploadMultiple: true,
        maxFiles: 5,
        addRemoveLinks: true,
        maxFilesize: 10, // MB,
        dictRemoveFile: "ลบออก",
        // dictDefaultMessage: "เลือกรูปภาพ",
        dictFileTooBig: "ไม่อนุญาตให้อัพโหลดไฟล์เกิน 2 MB",
        dictMaxFilesExceeded:"สามารถอัพโหลดได้ 1 รูป",
        dictInvalidFileType: "สามารถอัพได้เฉพาะ jpg,jpeg,png เเละ gif",
        acceptedFiles: "image/jpg,image/jpeg,image/png,image/gif",
        init: function() {
            this.on("error", function(file, message) { 
                this.removeFile(file); 
            });
        },
        removedfile: function(file) {
            let _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response) {
            if(response.data == "Success"){
                toastr.success('บันทึกข้อมูลเรียบร้อย')
                setTimeout(() => {
                window.location.href = '../config'
                }, 800);
            }
            else {
                toastr.error('ไม่สามารถบันทึกข้อมูลได้');
            }
        }
    });

    $('#formData').on('submit', function (e) {   
        e.preventDefault();
        Themedropzone.processQueue();
      });

      $('#submit_theme').on('click', function (e) {   
        //   console.log($("#theme").val());
            $.post("../../assets/lib/datareturn.php", {
                i: 120,
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



  