@extends('customer.layout_master')
@section('page_css')
  <link rel="stylesheet" href="{{url('public/css/jquery.fileupload.css')}}">
    <?php
    if(isset($_FILES['attactments'])){
        var_dump($_FILES);
    }
    ?>
@endsection()
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Ticket / Thêm</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
                <div class="box-body">
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                          <span>Tiêu đề</span>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                          </div>
                        </div>

                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                          <span>Tóm lược</span>
                        </div>
                        <div class="col-md-10">
                          <div class="box-body pad" style="padding-left: 0;padding-right: 0">
                                <textarea id="editor1" name="editor1" rows="10" cols="80">

                                </textarea>
                          </div>
                        </div>

                    </div>
                  </div>
                  <div class="col-md-12" style="margin-bottom: 10px;">
                    <div class="row">
                      <div class="col-md-2">
                        <span>Đính kèm</span>
                      </div>
                       <!-- The file upload form used as target for the file upload widget -->

      {{--uploadfile--}}

        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="images[]" id="images" multiple>
                </span>
                <hr>
                <div id="images-to-upload">


                </div>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>

    {{--//end upload--}}

                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-2">
                        <span>Danh mục</span>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control" name="select_email" id="foreach">
                            <option value="" disabled selected>---- Chọn danh mục ----</option>

                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <span style="float: right;">Độ ưu tiên</span>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="form-group">
                            <select class="form-control" name="select_email">
                              <option value="1" disabled selected>---- Chọn độ ưu tiên ----</option>
                              <option value="2">Thấp</option>
                              <option value="3">Trung bình</option>
                              <option value="4">Cao</option>
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row" style="padding: 0 15px;">
                    <div class="box-footer">
                      <button type="" class="btn btn-primary save_ticket" style="float: right">Save Ticket</button>
                      <button type="" class="btn btn_save" style="float: right; margin-right: 10px;">Cancel</button>
                    </div>
                  </div>

                </div>

          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
     </div>
    <!-- /.content -->
 @endsection
 @section('page_script')


<!-- ./wrapper -->
<script src="{{url('public/js/jquery.uploadfile.js')}}"></script>
<script src="{{url('public/js/jquery.ui.widget.js')}}"></script>

<!-- The main application script -->
<script src="{{url('public/js/main.js')}}"></script>
<script src="{{url('public/js/jquery.fileupload.js')}}"></script>

<script type="text/javascript">
  //Date picker

  //Click Save ticket
  $('.save_ticket').on('click', function(event) {
    event.preventDefault();

      var formData = new FormData();
          formData.append("file_name",$('input[name=testfile]')[0].files[0]);
          formData.append("content",'test content');
          formData.append("title",'test tittle');
          formData.append("priority",'2');
          formData.append("status",'1');
          formData.append("category_id",'1');

      $.ajax({
          url : 'http://ticket.dev-altamedia.com/api/detail_file',
          type : 'POST',
          data: formData,

          contentType: false,
          processData: false,
          success: function(data){
              console.log(data);
          },
          error   : function(jqXHR,status, errorThrown){
              my_error(jqXHR.status);
          }
      });
  });



  $.ajax({
      url: 'http://ticket.dev-altamedia.com/api/category',
      type: 'GET',
      success:function(data){
          console.log(data);
          var html ="";
          $.each(data,function(k,v){
              html += '<option value="'+v.id+'">'+v.name+'</option>';
          });
          $('#foreach').append(html);
      }
  });



</script>
<script id="template-upload" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
@endsection
