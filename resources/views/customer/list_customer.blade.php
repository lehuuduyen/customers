@extends('customer.layout_master')
@section('page_css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection()
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Khách Hàng / Danh sách</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <span class="btn-danger">test</span>
                  <div class="col-md-12">
                    <div class="row">
                        <table class="table table-bordered table-striped" style="text-align: center;" id="list_customer">
                          <thead>
                            <tr>
                              <th width="5%" style="text-align: center;">ID</th>
                              <th width="10%" style="text-align: center;">Tên khách hàng</th>
                              <th width="20%" style="text-align: center;">Ngày sinh</th>
                              <th width="20%" style="text-align: center;">Giới tính</th>
                              <th width="10%" style="text-align: center;">Tình trạng</th>
                              <th width="10%" style="text-align: center;">Create_at</th>
                              <th width="10%" style="text-align: center;">Update_at</th>
                              <th width="10%" style="text-align: center;">Action</th>


                            </tr>
                          </thead>
                        </table>

                    </div>
                  </div>


                </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
    
@endsection


@section('page_script')
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

  $('#list_customer').DataTable({
      processing: true,
      serverSide: true,
      ajax: 'http://crm.dev-altamedia.com/api/customer/anydata',
      columns: [
          { data: 'id' },
          { data: 'last_name' },
          { data: 'birthday' },
          { data: 'gender' },
          { data: 'status' },
          { data: 'created_at' },
          { data: 'updated_at' },
          {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
  });
    $('.btn-danger').on('click',function(event) {
     // event.preventDefault();
      alert(123);
//      var id = $(this).attr('val_del');
//      console.log(id);
//      $.ajax({
//          url : 'http://crm.dev-altamedia.com/api/customer/delete/'+id,
//          type : 'DELETE',
//          //headers : {'Authorization': token},
//          success: function(data){
//              console.log(data);
//          },
//          error   : function(jqXHR,status, errorThrown){
//              my_error(jqXHR.status);
//          }
//      });
  })
    function myClick(id){
        $.ajax({
          url : 'http://crm.dev-altamedia.com/api/customer/delete/'+id,
          type : 'DELETE',
          //headers : {'Authorization': token},
          success: function(data){
              console.log(data);
          },
          error   : function(jqXHR,status, errorThrown){
              my_error(jqXHR.status);
          }
      });
    }
</script>

@endsection


