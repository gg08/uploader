var document_root = 'http://localhost/github/uploader/upload.php';
$(document).ready(function () {

    /* Image upload*/
    var maxSize = 1148576;
    var cont = $("#hdncont").val();
    new AjaxUpload('#btnAddPhoto', {
        //UPLOADS FILE TO THE $_FILES VAR
        action: document_root + '?f=upload_temp_file',
        name: 'file',
        data: {
            maxSize: maxSize
        },
        onComplete: function (file, response) {
            //ONCE THE USER SELECTS THE FILE
            if (isNaN(response)) {
                //IF THE RESPONSE OF upload.php ITS NOT A NUMBER (NOT AN ERROR)
                var html = '<tr id="row_' + cont + '" >';
                html += '<td>' + file + '</td>';
                html += '<td><img class="media-object" height="50" width="50" src="media/' + response + '"></td>';
                html += '<td class="remove" response="'+response+'"><img class="media-object" src="media/delete.png"></td>';
                html += '</tr>';
                $("#container-files tbody").append(html);

                $("#hdncont").val(parseInt(cont) + 1);
                $("#row_" + cont + " .remove").click(function () {
                    deleteFile( $(this).attr("response") );
                    var key = $(this).attr("key");
                    $(this).parent().remove();
                });


            } else {//ERRORS ON THE FILE UPLOADED
                switch (response) {
                    case '1':
                        alert("File's extension is not valid.");
                        break;
                    case '2':
                        alert("File's size is too big.");
                        break;
                    case '3':
                        alert('Permissions error.');
                        break;
                    default:
                        alert('There was an error uploading your file.');
                        break;
                }
            }
        }
    });

    $("#btnAddPhoto").bind("click", function () {
        newRowPhoto($("#hdncont").val());
    });
});


function deleteFile(file) {
    $.ajax({
        url: document_root + '?f=delete_temp_file',
        type: "post",
        data: ({
            file: function () {
                return file;
            }
        }),
        success: function (data) {
        }
    });
}