/*
 * jQuery File Upload Plugin JS Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global $, window */

var fileCollection = new Array();
$('#images').on('change',function(e){
    var files = e.target.files;
    $.each(files, function(i, file){
        fileCollection.push(file);
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var template = '<form action="/upload">'+
                '<img src="'+e.target.result+'" width="100px"> '+
                '<label>'+file['name']+'</label>'+
                ' <button class="btn btn-sm btn-info upload">Upload</button>'+
                ' <a href="#" class="btn btn-sm btn-danger remove">Remove</a>'+
                '</form>';
            $('#images-to-upload').append(template);
        };
    });
});
$(document).on('submit','form',function (e) {
    e.preventDefault();
    var index   = $(this).index();
    var formdata= new FormData($(this)[0]);
    formdata.append('image',fileCollection[index]);
    var request = new XMLHttpRequest();
    request.open('post','http://ticket.dev-altamedia.com/api/detail_file',true);
    request.send(formdata);
    console.log(formdata)

})


