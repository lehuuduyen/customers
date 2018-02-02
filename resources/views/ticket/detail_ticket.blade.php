@extends('customer.layout_master')
@section('page_css')
    <link rel="stylesheet" href="{{url('public/css/jquery.fileupload.css')}}">
    <link rel="stylesheet" href="{{url('public/css/toastr.min.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <style>
      #page_ticket ul{
          list-style: none;
          text-align: center;
      }
      .active_page{
          background: red;
      }
      #page_ticket ul li{
          display: inline-block;
          width: 40px;
          height: 40px;
          cursor: pointer;
          line-height: 40px;
          font-size: 22px;
      }
      #detail_ticket{
          background: #ecf0f5;
          overflow: hidden;
      }
  </style>
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

            <div class="box-body" >
              <div class="col-md-12">

                <h1>Thông tin Ticket</h1>
                <div class="col-md-12" >
                        <h3>Tình Trạng:
                        <select class="form" id="selt">

                        </select>


                    </h3>


                    <div class="row">
                    <div class="col-md-2">
                      <span>Tiêu đề</span>
                    </div>
                    <div class="col-md-10">
                      <div class="form-group">
                        <input type="text" class="form-control" style="" id="title" placeholder="Enter ..." disabled value="">
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
                        <textarea class="form-control" id="content" rows="3" placeholder="Enter ..." disabled></textarea>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-2">
                      <span>Đính kèm</span>
                    </div>
                    <div class="timeline-body" id="img" style="overflow: hidden">

                    </div>

                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-2">
                      <span>Danh mục</span>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter ..." id="category" disabled>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <span style="float: right;">Độ ưu tiên</span>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Enter ..." id="priority" disabled>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
            <div class="clearfix"></div>
            <hr class="hr">


            <!-- Content Wrapper. Contains page content -->
            <div class="content" id="detail_ticket">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h1>
                  Timeline
                  <small>example</small>
                </h1>

              </section>
              <div class="col-xs-12"  >
                <!-- Main content -->
                <section class="content">

                  <!-- row -->
                  <div class="row">
                    <div class="col-md-12">
                      <!-- The time line -->
                      <ul class="timeline" id="timeline">

                      </ul>
                        <div class="row" id="page_ticket">
                            <ul>

                            </ul>
                        </div>
                    </div>
                  </div>

                </section>
              </div>
            </div>


              <div class="row fileupload-buttonbar " style="margin: 10px" >

                  <!-- The fileinput-button span is used to style the file input field as button -->
                  <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span class="col-md-10">Add files...</span>
                    <input type="file" name="images[]" id="images" >
                </span>
                  <hr>
                  <div id="images-to-upload">



                  </div>

                  <!-- The table listing the files available for upload/download -->


                  {{--//end upload--}}


              </div>








              <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Timeline Post</h3>
                  </div>
                  <div class="panel-body">
                      <form role="form">
                          <fieldset>
                              <div class="form-group">
                                  <textarea class="form-control" rows="3" placeholder="Write in your wall" name="email" type="textarea" id="target" autofocus=""></textarea>
                              </div>
                              <!-- Change this to a button or input when using this as a form -->
                              <button type="" class="btn btn-primary save_ticket" style="float: right">Save Ticket</button>
                          </fieldset>
                      </form>
                  </div>
              </div>
          </div>


        </div>
        </form>
      </div>
      <!-- /.box -->
  </div>

  <!-- /.row -->
  </section>
  <!-- /.content -->
  </div>
@endsection



@section('page_script')
    <script src="{{url('public/js/toastr.min.js')}}"></script>
    <script src="{{url('public/js/main1.js')}}"></script>
    <script src="{{url('public/js/popImg.js')}}"></script>

    <script type="text/javascript">
        var page = {{$id}};
        html=""
        $.ajax({
            url: 'http://ticket.dev-altamedia.com/api/ticket/'+page,
            type: 'GET',
            success:function(kq){
                for(i=1;i<=3;i++){
                    if(kq[0]['status']==i){
                        html+= '<option value="'+i+'" selected>'+kq['status'][i]+'</option>';
                    }
                    else{
                        html+= '<option value="'+i+'">'+kq['status'][i]+'</option>';
                    }
                }

                $("#selt").append(html);

            }

        });

        $('#selt').on('change',function(){
            var page = {{$id}};
            val=$(this).val();
            $.ajax({
                url: 'http://ticket.dev-altamedia.com/api/ticket/'+page,
                type: 'PUT',
                data:'status='+val,
                success:function(kq){
                console.log(kq)

                }
            });

        });
    </script>
  <script type="text/javascript">
      $(document).ready(function() {
          var page = {{$id}};
          title ="";
          content ="";
          img ="";
          category ="";
          priority="";
          $.ajax({
              url: 'http://ticket.dev-altamedia.com/api/ticket/'+page,
              type: 'GET',
              success:function(kq){

                  var title = kq[0]['title'];
                  var content = kq[0]['content'];
                  var category = kq[0]['category']['name'];
                  var priority = kq[0]['priority'];
                  $.each(kq.priority,function(i,v){
                      if(i == priority){
                          $("#priority").val(v);
                      }
                  });

                  if(priority==1){
                      $("#priority").css('color','green');
                  }
                  else if(priority==2){
                      $("#priority").css('color','blue');
                  }
                  else {
                      $("#priority").css('color','red');
                  }
                  $("#title").val(title);
                  $("#content").val(content);
                  $("#category").val(category);                      for(i=0;i<kq[0]['detail_file'].length ;i++){

                          if(kq[0]['detail_file'][i]['type']=='zip'||kq[0]['detail_file'][i]['type']=='rar'){
                              $("#img").append('<a href="http://ticket.dev-altamedia.com/storage/app/public/file/'+kq['date']+'/'+kq[0]['detail_file'][i]['file_name']+'" download><img src="http://ticket.dev-altamedia.com/storage/app/public/image/30-01-18/313_1517305156_zip.png" width="50px" alt="" class="margin"> </a>');
                          }
                          else{
                              $("#img").append('<img src="http://ticket.dev-altamedia.com/storage/app/public/image/'+kq['date']+'/'+kq[0]['detail_file'][i]['file_name']+'" width="50px" alt="" class="margin zoom">');
                              $.getScript("./public/dist/js/test.js");

                          }
                      }




              }
          });
      });

  </script>



  <script>
      var ticket_id = {{$id}};
      function loadajax(page){
          var ticket_id = {{$id}};


          var html="";
          var li = "";
          $.ajax({
              url: 'http://ticket.dev-altamedia.com/api/ticket_response/'+ticket_id,
              type: 'GET',
              success:function(kq){

                  $.each(kq.data,function(i,v){
                      html += '<li><i class="fa fa-user ';
                      if(v.customers_id == null){

                          html +='bg-yellow"></i>';
                          html += '<div class="timeline-item">';
                          html += '<span class="time" id="time"><i class="fa fa-clock-o"></i> 2018-01-27 20:29:00</span><h3 class="timeline-header no-border"><span style="color:blue">'+v.user_id+': </span>'+v.content+'</h3>';
                          if(v.detail_file.length!=0){
                              for (j =0;j<v.detail_file.length;j++) {
                                  var date =new Date(v.detail_file[j]['created_at']);
                                  date= moment(date).format('DD-MM-YY');
                                  if(v.detail_file[j]['type']=='zip'|v.detail_file[j]['type']=='rar'){
                                      html+='<a href="http://ticket.dev-altamedia.com/storage/app/public/file/'+date+'/'+v.detail_file[j]['file_name']+'" download><img src="http://ticket.dev-altamedia.com/storage/app/public/image/30-01-18/313_1517305156_zip.png" height="50px" width="50px" alt="" class="margin"> </a>';
                                  }
                                  else{
                                      html+='<img src="http://ticket.dev-altamedia.com/storage/app/public/image/'+date+'/'+v.detail_file[j]['file_name']+'" height="50px"  width="50px" alt="" class="margin zoom">';
                                  }
                              }
                          }
                      }else{
                          html +='bg-green"></i>';
                          html += '<div class="timeline-item">';
                          html += '<span class="time" id="time"><i class="fa fa-clock-o"></i> 2018-01-27 20:29:00</span><h3 class="timeline-header no-border"><span style="color:blue">'+v.customers_id+': </span>'+v.content+'</h3>';
                          if(v.detail_file.length!=0){
                              for (j =0;j<v.detail_file.length;j++) {
                                  var date =new Date(v.detail_file[j]['created_at']);
                                  date= moment(date).format('DD-MM-YY');
                                  if(v.detail_file[j]['type']=='zip'|v.detail_file[j]['type']=='rar'){
                                      html+='<a href="http://ticket.dev-altamedia.com/storage/app/public/file/'+date+'/'+v.detail_file[j]['file_name']+'" download><img src="http://ticket.dev-altamedia.com/storage/app/public/image/30-01-18/313_1517305156_zip.png" width="50px" alt="" class="margin"> </a>';
                                  }
                                  else{
                                      html+='<img src="http://ticket.dev-altamedia.com/storage/app/public/image/'+date+'/'+v.detail_file[j]['file_name']+'" height="50px"  width="50px" alt="" class="margi zoom">';
                                  }
                              }
                          }
                      }

                  })
                  $("#timeline").html(html);


                  for(i=1;i<=kq.last_page;i++){
                      li += '<li>'+i+'</li>';
                  }
                  $('#page_ticket ul').html(li);
                  $.getScript("./public/dist/js/test.js");
              },
              complete:function () {
                  $('#page_ticket > ul li:first').addClass('btn-primary');
              }

          });

      }
      loadajax();

    </script>

    <script>
        //Click Save ticket
            $('.save_ticket').on('click', function(event) {
            event.preventDefault();
            var ticket_id={{$id}};
            user_id='1';
            customers_id="";
            content=$("#target").val();
            if(!content=="" ) {
                $.ajax({
                    url: 'http://ticket.dev-altamedia.com/api/ticket_response',
                    type: 'POST',
                    data: "content=" + content + "&ticket_id=" + ticket_id + "&user_id=" + user_id + "&customers_id="+customers_id,
                    success: function (data) {
                        array.forEach(function (item) {

                            $.ajax({
                                url: 'http://ticket.dev-altamedia.com/api/detail_file/'+item,
                                type: 'PUT',
                                data: "ticket_response_id="+data,
                                success: function (kq) {
                                    loadajax();
                                },

                            });

                        })


                        toastr.success('Send success');

                        location.reload();





                    },

                });
            }
        });

    </script>

    <script type="text/javascript">

    </script>
@endsection



