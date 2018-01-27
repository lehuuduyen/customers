@extends('customer.layout_master')
@section('page_css')
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection()
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Khách Hàng / chi tiết</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-body">

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



