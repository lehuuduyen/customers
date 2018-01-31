@extends('customer.layout_master')
@section('page_css')
  <link rel="stylesheet" href="{{url('public/css/jquery.fileupload.css')}}">
  <link rel="stylesheet" href="{{url('public/css/toastr.min.css')}}">

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
                            <input type="email" class="form-control" required id="title" placeholder="">
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
                            <div class="form-group">
                                <textarea class="form-control" required rows="5" id="content"></textarea>
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
        <div class="row fileupload-buttonbar " style="margin-left: 15px;" >

                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span class="col-md-10">Add files...</span>
                    <input type="file" name="images[]" id="images"  >
                </span>
                <hr>
                <div id="images-to-upload">


                </div>

        <!-- The table listing the files available for upload/download -->


    {{--//end upload--}}


                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-2">
                        <span>Danh mục</span>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control" name="select_email" required id="category">
                            <option value="" disabled selected>---- Chọn danh mục ----</option>

                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <span >Độ ưu tiên</span>
                      </div>
                      <div class="col-md-4">

                          <div class="form-group">
                            <select class="form-control" name="select_email" required id="priority">
                              <option value="1" disabled selected>---- Chọn độ ưu tiên ----</option>

                            </select>
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
<script src="{{url('public/js/toastr.min.js')}}"></script>
<script src="{{url('public/js/main.js')}}"></script>
<script src="{{url('public/js/jquery.fileupload.js')}}"></script>

<script type="text/javascript">
  //Date picker

  //Click Save ticket
  $('.save_ticket').on('click', function(event) {
    event.preventDefault();

     title=$("#title").val();
     content=$("#content").val();
     category=$("#category").val();
     priority=$("#priority").val();
      if(title=="" ){
          toastr.error('No empty title');
      }if(content=="" ){
          toastr.error('No empty content');
      }if(category==null ){
          toastr.error('No empty category');
      }if(priority==null ){
          toastr.error('No empty priority');
      }

      if(!title=="" && !content=="" && !category=="" && !priority=="") {

          $.ajax({
              url: 'http://ticket.dev-altamedia.com/api/ticket',
              type: 'POST',
              data: "title=" + title + "&content=" + content + "&category_id=" + category + "&priority=" + priority + "&customers_id=2",
              success: function (data) {

                  array.forEach(function (item) {
                    console.log(item)
                      $.ajax({
                          url: 'http://ticket.dev-altamedia.com/api/detail_file/'+item,
                          type: 'PUT',
                          data: "ticket_id="+data,
                          success: function (kq) {

                          },

                      });

                  })


                  toastr.success('Insert ticket success');
                  location.href="ticket/list";

              },

          });
      }
  });



  $.ajax({
      url: 'http://ticket.dev-altamedia.com/api/category',
      type: 'GET',
      success:function(data){
          var html ="";
          var priority="";
          $.each(data['category'],function(k,v){
              html += '<option value="'+v.id+'">'+v.name+'</option>';
          });
          $('#category').append(html);
          $.each(data['priority'],function(k,v){
              priority += '<option value="'+k+'">'+v+'</option>';
          });
          $('#priority').append(priority);
      }
  });



</script>

@endsection
