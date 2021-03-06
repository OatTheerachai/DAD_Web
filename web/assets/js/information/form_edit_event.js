const charLimit = 100;
// const Count;
function registerSummernote(element, max, callbackMax) {
    $(element).summernote({
    toolbar: [
        // ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
    ],
    height: 100,
      callbacks: {
        onKeydown: function(e) {
          var t = e.currentTarget.innerText;
          if (t.length >= max) {
            //delete key
            if (e.keyCode != 8 && !(e.keyCode >= 37 && e.keyCode <= 40) && e.keyCode != 46 && !(e.keyCode == 88 && e.ctrlKey) && !(e.keyCode == 67 && e.ctrlKey)) 
            {
                e.preventDefault();
            }
          }
        },
        onKeyup: function(e) {
          var t = e.currentTarget.innerText;
          if (typeof callbackMax == 'function') {
            callbackMax(max - t.length);
          }
        },
        onPaste: function(e) {
          var t = e.currentTarget.innerText;
          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
          e.preventDefault();
          var maxPaste = bufferText.length;
          let all = t.length + bufferText.length;
          if(all > max) {
            maxPaste = max - t.length;
          }
          if(maxPaste > 0){
            document.execCommand('insertText', false, bufferText.trim().substring(0, maxPaste));
          }
          if (typeof callbackMax == 'function') {
                callbackMax(max - t.length);
          }
        }   
      }
    });
  }

  registerSummernote('#details', 100, function(max) {
    $('#total-characters').text(max + "/100");
  });

$.ajax({
    url: "../../assets/lib/datareturn.php?i=2", 
    success: function(result){
        // console.log(result.data);
        for(let i =0; i < result.length; i++){
            $('#event_type').append($('<option>', { 
                value: result[i].id,
                text : result[i].name,
            }));
        }
    }});

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
    var count;
    $.ajax({
        url: '../../assets/lib/datareturn.php',
        type: 'post',
        data: {
            i: 109,
            id: id
        },
        dataType: 'json',
        success: function(response){
            // const e_id = response.data[0].id;
            $('#title').val(response[0].title);
            $('#event_type').val(response[0].et_id);
            // text.summernote('code',response[0].detail);
            $('#details').summernote('code',response[0].detail);
        }
    });
    var p_path;
    var p_id;
    var prevFile;
    var checkFilePic = 0;
    function ReadFilePic() {
        $.ajax({
            url: '../../assets/lib/datareturn.php',
            type: 'post',
            data: {
                i: 110,
                e_id: id
            },
            dataType: 'json',
            success: function(response){
                // console.log(response);
              $.each(response, function(key,value) {
                //   console.log(value.p_name);
                var mockFile = { 
                    name: value.p_name, 
                    size: value.size ,
                    id: value.p_id
                };
                p_id = value.p_id;
                p_path = value.path;
                Picdropzone.options.addedfile.call(Picdropzone, mockFile);
                Picdropzone.options.thumbnail.call(Picdropzone, mockFile, value.path);
                Picdropzone.files.push( mockFile );
                Picdropzone.options.complete.call(Picdropzone, mockFile);
                prevFile = mockFile;
              });
            }
        });
    }
var deleteIdPic;
var upload_pic = false;
var checkPic = 0;

//dropzone pic
Dropzone.autoDiscover = false;
var Picdropzone = new Dropzone('#mydropzone', {
    url: '../../assets/lib/datareturn.php',
    params: {
        i:113
    },
    paramName: "file",
    autoProcessQueue: false,
    parallelUploads: 10,
    uploadMultiple: true,
    maxFiles: 1,
    // addRemoveLinks: true,
    maxFilesize: 10, // MB
    dictRemoveFile: "???????????????",
    dictDefaultMessage: "?????????????????????????????????",
    dictFileTooBig: "????????????????????????????????????????????????????????????????????????????????? 2 MB",
    dictMaxFilesExceeded:"???????????????????????????????????????????????? 1 ?????????",
    dictInvalidFileType: "??????????????????????????????????????????????????? jpg,jpeg,png ???????????? gif",
    acceptedFiles: "image/jpg,image/jpeg,image/png,image/gif",
    init: function() {

        //set default picture by id
        ReadFilePic();

        this.on("addedfile", function(file) { 
            upload_pic = true;
            if (prevFile !== "undefined") {
                this.removeFile(prevFile);
                prevFile = file;
            }
        });

        //send form data to return id event
        this.on("sending", function(file, xhr, formData){
            // let title = $("#title").val();
            // let event_type = $("#event_type").val();
            // let details = $("#details").val();
            // formData.append("title", title);
            // formData.append("event_type", event_type);
            // formData.append("details", details);
            formData.append("id", id);
            formData.append("p_id", p_id);
            formData.append("p_path", p_path);
        }),

        this.on("error", function(file, message) { 
            // alert(message);
            this.removeFile(file); 
        });
    },
    removedfile: function(file) {
        let _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    success: function(file, response) {
        console.log(response.data);
        if(response.data == "Success"){
            toastr.success('???????????????????????????????????????????????????????????????')
            setTimeout(() => {
              window.location.href = '../information'
            }, 800);
            // if(upload_Video == true){
            //     Videodropzone.processQueue();
            // }
            // else {
            //     toastr.success('???????????????????????????????????????????????????????????????')
            //     setTimeout(() => {
            //       window.location.href = '../information'
            //     }, 800);
            // }
        }
        else {
            toastr.error('????????????????????????????????????????????????????????????????????????');
        }
        // if(upload_Video == true) {
        //     Videodropzone.processQueue();
        // }
    }
});
// var v_id;
// var v_path;
// var prevFileVideo;
// var upload_Video = false;
// function ReadFileVideo() {
//     $.ajax({
//         url: '../../assets/lib/datareturn.php',
//         type: 'post',
//         data: {
//             i: 111,
//             e_id: id
//         },
//         dataType: 'json',
//         success: function(response){
//           $.each(response, function(key,value) {
//             var mockFile = { 
//                 id: value.id,
//                 name: value.v_name, 
//                 size: value.size 
//             };
//             v_id = value.v_id;
//             v_path = value.v_path;
//             Videodropzone.options.addedfile.call(Videodropzone, mockFile);
//             Videodropzone.options.thumbnail.call(Videodropzone, mockFile, '../../assets/img/video.png');
//             Videodropzone.files.push( mockFile );
//             Videodropzone.options.complete.call(Videodropzone, mockFile);
//             prevFileVideo = mockFile;
//           });
//         }
//     });
// }

//   //dropzone video
//   var checkVideo = 0;
//   var Video_name = new Array;
//   var Videodropzone = new Dropzone('#mydropzone_video', {
//       url: '../../assets/lib/datareturn.php',
//       params: {
//           i:114
//       },
//       paramName: "video",
//       autoProcessQueue: false,
//       maxFiles: 1,
//       parallelUploads: 10,
//       uploadMultiple: true,
//     //   addRemoveLinks: true,
//       maxFilesize: 10, // MB
//       dictRemoveFile: "???????????????",
//       dictDefaultMessage: "?????????????????????????????????",
//       dictFileTooBig: "????????????????????????????????????????????????????????????????????????????????? 2 MB",
//       dictMaxFilesExceeded:"???????????????????????????????????????????????? 1 ??????????????????",
//       dictInvalidFileType: "??????????????????????????????????????????????????????????????? mp4",
//       acceptedFiles: "video/mp4",
//       init: function() {

//         //set default video by id
//         ReadFileVideo();
//         this.on("sending", function(file, xhr, formData){
//             formData.append("id", id);
//             formData.append("v_id", v_id);
//             formData.append("v_path", v_path);
//         }),

//         this.on("addedfile", function(file) { 
//             upload_Video = true;
//             file.previewElement.querySelector("img").src = '../../assets/img/video.png';
//             if (prevFileVideo !== "undefined") {
//                 this.removeFile(prevFileVideo);
//                 prevFileVideo = file;
//             }
//         });
//         this.on("error", function(file, message) { 
//             alert(message);
//             this.removeFile(file); 
//         });

//       },
//       success: function(file,res) {
//         if(res.data == "Success"){
//             toastr.success('???????????????????????????????????????????????????????????????')
//             setTimeout(() => {
//               window.location.href = '../information'
//             }, 800);
//         }
//         else {
//             toastr.error('????????????????????????????????????????????????????????????????????????');
//         }
//       },
//       removedfile: function(file) {
//           let _ref;
//           return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
//       }
//   });

  async function sendEvent() {
    let title = $("#title").val();
    let event_type = $("#event_type").val();
    let details = $("#details").val();
    await $.post("../../assets/lib/datareturn.php", {
        i: 112,
        id: id,
        title: title,
        event_type:event_type,
        details:details,
    });
  }

  $('#formData').on('submit', function (e) {   
    e.preventDefault();
    if(upload_pic == true) {
        sendEvent();
        Picdropzone.processQueue();
    }    
    else {
        let title = $("#title").val();
        let event_type = $("#event_type").val();
        let details = $("#details").val();
        $.post("../../assets/lib/datareturn.php", {
            i: 112,
            id: id,
            title: title,
            event_type:event_type,
            details:details,
        }).done(function(resp) {
            if(resp.data == "Success"){
              toastr.success('????????????????????????????????????????????????????????????')
              setTimeout(() => {
                window.location.href = '../information'
              }, 800);
            }
            else {
                toastr.error('????????????????????????????????????????????????????????????????????????');
            }
        });
    }
  });
