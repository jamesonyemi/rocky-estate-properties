'use strict';

$(document).ready(function () {
    if (window.File && window.FileList && window.FileReader) {
      
        $("#img_name").on("change", function (e) {
            let files = e.target.files,
                filesLength = files.length;
            for (let i = 0; i < filesLength; i++) {
                let f = files[i];
                let fileReader = new FileReader();
                fileReader.onload = (function (e) {
                    $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
                        "<br/><span class=\"remove\"><small>X</small></span>" +
                        "</span>").insertAfter("#img_name");
                    $(".remove").click(function () {
                        $(this).parent(".pip").remove();
                        $("#img_name").val();
                    });

                });
                fileReader.readAsDataURL(f);
            }
        });
  } else {
        alert("Your browser doesn't support to File API")
    }
});

