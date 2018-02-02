@extends('customer.layout_master')
@section('page_css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{url('public/css/bootstrap-editable.css')}}">

@endsection()
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>My ticket</h1>
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
                                        <th width="20%" style="text-align: center;">Customer</th>
                                        <th width="20%" style="text-align: center;">Title</th>
                                        <th width="20%" style="text-align: center;">Priority</th>
                                        {{--<th width="10%" style="text-align: center;">Tình trạng</th>--}}
                                        <th width="10%" style="text-align: center;">Create_at</th>
                                        <th width="10%" style="text-align: center;">Update_at</th>
                                        <th width="10%" style="text-align: center;">Total Response</th>
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
    <script src="{{url('public/js/bootstrap-editable.min.js')}}"></script>

    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        var ticket_id = {{$id}};
        $('#list_customer').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'http://ticket.dev-altamedia.com/api/myticket/'+ticket_id,
            columns: [
                { data: 'id' ,searchable: false},
                { data: 'customers_id' },
                { data: 'title' },
                { data: 'priority' },
//                { data: 'status'},
                { data: 'created_at' },
                { data: 'updated_at' },
                { data: 'Total Response', name: 'Total Response', orderable: false, searchable: false},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]

        }); $('#list_customer').editable({
            container   : 'body',
            selector    : 'td.designation',
            url         :'http://ticket.dev-altamedia.com/api/ticket',
            title       :'Designation',
            type        : 'PUT',
            validate:function (value) {
                if($.trim(value))
                    return 'This field is required';
            }

        });



    </script>

@endsection


