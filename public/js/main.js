var fileCollection = new Array();
var u =[];
u =-1;

$('#images').on('change',function(e){
    var files = e.target.files;

    $.each(files, function(i, file){
        fileCollection.push(file);
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            console.log(file)
            if(file.type=="image/jpeg"||file.type=="image/png"||file.type=="image/gif") {
                var template =
                    '<form class="form' + u + '" action="/upload"  > ' +
                    '<img style="margin:5px 20px"  src="' + e.target.result + '"   width="100px"> ' +
                    '<label style="margin:5px 20px" >' + file['name'] + '</label>' +
                    '<button style="margin:5px 20px" class="btn btn-primary upload' + u + '" >' +
                    '<i class="glyphicon glyphicon-upload"></i>' +
                    '<span>Upload</span>' +
                    '</button>' +
                    '<a class="btn btn-danger delete remove' + u + '" style="display: none" >' +
                    '<i class="glyphicon glyphicon-trash"></i>' +
                    '<span>Delete</span>' +
                    '</a>' +
                    '<input type="hidden" class="id' + u + '"></input>' +
                    '<hr>' +
                    '<hr>' +
                    '</form>';

            }   else {
                var template =
                    '<form class="form' + u + '" action="/upload"  > ' +
                    '<img style="margin:5px 20px"  src="http://ticket.dev-altamedia.com/hinh/image/30-01-18/313_1517305156_zip.png/"   width="100px"> ' +
                    '<label style="margin:5px 20px" >' + file['name'] + '</label>' +
                    '<button style="margin:5px 20px" class="btn btn-primary upload' + u + '" >' +
                    '<i class="glyphicon glyphicon-upload"></i>' +
                    '<span>Upload</span>' +
                    '</button>' +
                    '<a class="btn btn-danger delete remove' + u + '" style="display: none" >' +
                    '<i class="glyphicon glyphicon-trash"></i>' +
                    '<span>Delete</span>' +
                    '</a>' +
                    '<input type="hidden" class="id' + u + '"></input>' +
                    '<hr>' +
                    '</form>';

            }
            $('#images-to-upload').append(template);
        };
    });
    u=u+1;

});

var array=[];
$(document).on('submit','form',function (e) {
    e.preventDefault();
    var index   = $(this).index();
    var formdata= new FormData($(this)[0]);
    console.log(formdata)
    formdata.append('image',fileCollection[index]);
    var request = new XMLHttpRequest();
    request.open('post','http://ticket.dev-altamedia.com/api/detail_file',true);
    request.send(formdata);
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            id=this.responseText;
            $(".id"+index).val(id);
            toastr.success('Upload Success');
            $(".upload"+index).hide();
            $(".remove"+index).css('display',"");
            array.push(id);
            $(".remove"+index).click(function () {
                del_id=$(".id"+index).val();
                $.ajax({
                    url: 'http://ticket.dev-altamedia.com/api/detail_file/'+del_id,
                    type: 'DELETE',
                    success: function (data) {
                        toastr.info('Delete Success');
                        $('.form'+index).hide();
                        delete array[index];
                    },
                });
            });
        }
    }
});


