@extends('customer.layout_master')
@section('page_css')
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
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
            <div class="content">
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
                        <!-- timeline time label -->
                        <!-- /.timeline-label -->
                        <!-- timeline item -->

                        <!-- END timeline item -->
                        <!-- timeline item -->

                      </ul>
                    </div>
                  </div>

                </section>
              </div>
            </div>










            <div class="content">

              <h1>Nội dung phản hồi</h1>

              <div class="pri_message">
                <textarea id="target" name="" rows="5" style="width: 100%"></textarea>

              </div>
              <div class="row" style="padding: 0 15px;">
                <div class="box-footer">
                  <button type="" id="submit" class="btn btn-primary save_ticket" style="float: right">Save Ticket</button>
                  <button type="" class="btn btn_save" style="float: right; margin-right: 10px;" id="pagination">Cancel</button>
                </div>
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
                  $.each(kq,function(key,item){
                      title+=item['title'];
                      content+=item['content'];
                      category+=item['category']['name'];
                      priority+=item['priority'];
                      if(priority==1){
                          $("#priority").val('Thấp');
                          $("#priority").css('color','green');

                      }
                      else if(priority==1){
                          $("#priority").css('color','blue');
                          $("#priority").val('Trung bình');
                      }
                      else {
                          $("#priority").css('color','red');
                          $("#priority").val('Cao');

                      }
                      $("#title").val(title);
                      $("#content").val(content);
                      $("#category").val(category);
                      for(i=0;i<=item['detail_file'].length ;i++){

                          $("#img").append('<img src="http://ticket.dev-altamedia.com/hinh/'+item['detail_file'][i]['file_name']+'/" width="100px" alt="" class="margin">');
                      }

                  })



              }
          });
      });

  </script>
    <script type="text/javascript">
   
      $("#pagination").click(function(event) {
        /* Act on the event */
        alert('dsadsad');
      });
    
  </script>
  <script type="text/javascript">

      function loadajax(page){
          var ticket_id = {{$id}};


          html="";

          $.ajax({
              url: 'http://ticket.dev-altamedia.com/api/ticket_response/'+ticket_id+'?page='+page,
              type: 'GET',
              success:function(kq){
                 

                  for (var i =0; i < kq[0]['data'].length ; i++) {
                      $.each(kq,function(key,item){

                          if(kq[0]['data'][i]['user_id']== null){


                              html+='<li>';
                              html+='  <i class="fa fa-user bg-aqua"></i>';

                              html+=' <div class="timeline-item">'
                              html+='<span class="time" id="time"><i class="fa fa-clock-o"></i>'+kq[0]['data'][i]['created_at']+  ' </span>';


                              html+='<h3 class="timeline-header no-border"> <span style="color:blue">Name:'+kq[0]['data'][i]['customers_id']+' </span>  '+kq[0]['data'][i]['content'] +'</h3>';


                              html+=' <div class="timeline-body">';
                              for (j =0;j<kq[0]['data'][i]['detail_file'].length;j++) {

                                  html+='<img src="http://ticket.dev-altamedia.com/hinh/'+kq[0]['data'][i]['detail_file'][j]['file_name']+'/" width="200px" alt="..." class="margin">';
                              }


                              html+='  </div>';
                              html+=' </div>';





                              html+=' </li>';



                          }
                          else{
                              html+='<li>';
                              html+='  <i class="fa fa-user bg-yellow"></i>';

                              html+=' <div class="timeline-item">'
                              html+='<span class="time" id="time"><i class="fa fa-clock-o"></i>'+kq[0]['data'][i]['created_at']+  ' </span>';


                              html+='<h3 class="timeline-header no-border"> <span style="color:blue">Name:'+kq[0]['data'][i]['user_id']+' </span>  '+kq[0]['data'][i]['content'] +'</h3>';


                              html+=' <div class="timeline-body">';
                              for (j =0;j<kq[0]['data'][i]['detail_file'].length;j++) {

                                  html+='<img src="http://ticket.dev-altamedia.com/hinh/'+kq[0]['data'][i]['detail_file'][j]['file_name']+'/" width="200px" alt="..." class="margin">';
                              }


                              html+='  </div>';
                              html+=' </div>';





                              html+=' </li>';


                          }






                      });
                  }
                  $("#timeline").html(html);
              }
          });

      }
loadajax();
  </script>


  <script type="text/javascript">
$(document).ready(function() {

  $("#submit").on('click',  function(event) {
    event.preventDefault();
    /* Act on the event */

    target= $("#target").val();
        

    var ticket_id = {{$id}};
    customers_id=null;
    user_id=1;
    if(target !="")
    {
      if(customers_id!=null){
        $.ajax({

         url : 'http://ticket.dev-altamedia.com/api/ticket_response',

         type : 'POST',

         data: 'customers_id='+customers_id+"&content="+target+"&ticket_id="+ticket_id,



         success: function(data){
         loadajax();
          $("#target").val("");
         },

         error   : function(jqXHR,status, errorThrown){

             my_error(jqXHR.status);

         }

     });
     }
     else{
       $.ajax({

         url : 'http://ticket.dev-altamedia.com/api/ticket_response',

         type : 'POST',

         data: 'user_id='+user_id+"&content="+target+"&ticket_id="+ticket_id,



         success: function(data){

           loadajax();
          $("#target").val("");
         },

         error   : function(jqXHR,status, errorThrown){

             my_error(jqXHR.status);

         }

     });
     }
   }
  });
 
   
});
  
</script>


@endsection



