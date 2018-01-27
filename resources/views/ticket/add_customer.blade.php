@extends('customer.layout_master')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Khách Hàng / Thêm</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
<form role="form">
              <div class="box-body">

                <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label>Vai trò</label>
                             <select class="form-control" id="chose_role">
                               <option value="1" selected="selected">Cá nhân</option>
                               <option value="2">Doanh nghiệp</option>
                             </select>
                           </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="txt_status">
                              <option selected disabled>---Chọn trạng thái---</option>

                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row flag-hidden" id="infopoeple">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tên <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="" name="txt_lastname" placeholder="Tên">
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Họ</label>
                            <input type="text" class="form-control" id="" name="txt_firtname" placeholder="Họ">
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Ngày sinh</label>
                           <input type="text" class="form-control" id="datepicker" name="txt_birthday">
                          </div>
                          <span class="icon_calendar"><i class="fa fa-calendar"></i></span>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Giới Tính</label>
                            <select class="form-control" name="txt_sex" >
                              <option value="0">Nữ</option>
                              <option value="1">Nam</option>
                              <option value="2">Khác</option>
                            </select>
                          </div>
                        </div>
                      </div>


                      <div class="row flag-hidden">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Số CMND</label>
                            <input type="text" class="form-control" id="" name="txt_cmnd" placeholder="Số CMND">
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Chức vụ</label>
                            <input type="text" class="form-control" id="" name="txt_position" placeholder="Chức danh">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Kênh khách hàng</label>
                            <select class="form-control" name="txt_customer" >
                              <option>Chọn kênh khách hàng</option>

                            </select>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Ngành nghề</label>
                            <select class="form-control" name="txt_career">
                              <option>Chọn nghành nghề</option>

                            </select>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-12" style="display: none;" id="infocompanny">
                      
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" name="txt_nameCom" id="" placeholder="Tên Công Ty">
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Kênh khách hàng</label>
                            <select class="form-control" name="txt_cusCom">
                              <option>Chọn kênh khách hàng</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Ngành nghề</label>
                            <select class="form-control" name="txt_careerCom" >
                              <option>Chọn nghành nghề</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                </div>

                <div class="col-md-6">
                  
                  <div class="row" id="company">
                    <div class="row">
                      <label for="" class="padd_l3">Doanh nghiệp</label>
                      <div class="col-xs-12">
                        <div class="col-xs-9">
                          <div class="form-group">
                            <input type="text" class="form-control" name="txt_enterprise" id="" placeholder="Chọn công ty">
                          </div>
                        </div>
                        <div class="col-xs-2">
                          <span class="icon_circle"><i class="fa fa-plus-circle"></i></span>
                        </div>
                      </div>
                    </div>
                    
                    
                  </div>
                  
                  <div class="row">

                    <div class="row class_root" id="telephone">
                      <label class="padd_l3">Điện thoại</label>

                      <div class="col-xs-12">
                        <div class="col-xs-3 padd_r">
                          <div class="form-group">
                            <select class="form-control" name="sl_name">
                              <option value="home">Home</option>
                              <option value="work">Work</option>
                              <option value="mobile">Mobile</option>
                              <option value="other">Other</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-6 padd_l" style="">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="" name="txtname">
                          </div>
                          <span class="spanicon"><i class="fa fa-minus-circle"></i></span>
                        </div>
                        <div class="col-xs-2">
                          <span class="icon_circle"><i class="fa fa-plus-circle"></i></span><span class="icon_circletop flag_block"></span>
                        </div>
                      </div>
                      
                    </div>
                    
                  </div>
                  
                  <div class="row">
                    <div class="row class_root" id="email">
                      <label class="padd_l3">Email</label>
                      <div class="col-xs-12">
                        <div class="col-xs-3 padd_r" style="">
                          <div class="form-group">
                            
                            <select class="form-control" name="select_email">
                              <option value="work">Work</option>
                              <option value="home">Home</option>
                              <option value="other">Other</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-6 padd_l" style="">
                          <div class="form-group">
                            <input type="text" class="form-control" id="" placeholder="Email">
                          </div>
                          <span class="spanicon"><i class="fa fa-minus-circle"></i></span>
                        </div>
                         <div class="col-xs-2">
                          <span class="icon_circle"><i class="fa fa-plus-circle"></i></span><span class="icon_circletop flag_block"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row" id="message">
                    <div class="row">
                       <label class="padd_l3">Tin Nhắn</label>
                      <div class="col-xs-12">
                        <div class="col-xs-3 padd_r" style="">
                          <div class="form-group">
                            <select class="form-control">
                              <option>Skype</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-6 padd_l" style="">
                          <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Instance message">
                          </div>
                          <span class="spanicon"><i class="fa fa-minus-circle"></i></span>
                        </div>
                         <div class="col-xs-2">
                          <span class="icon_circle"><i class="fa fa-plus-circle"></i></span><span class="icon_circletop flag_block"></span>
                        </div>
                      </div>
                    </div>
                      
                  </div>
                  
                  <div class="row" id="website">
                    <div class="row">
                     <label for="" class="padd_l3">Website</label>
                     <div class="col-xs-12">
                        <div class="col-xs-9">
                          <div class="form-group">
                            <input type="text" class="form-control" id="" placeholder="https://beeiq.co">
                          </div>
                          <span class="spanicon"><i class="fa fa-minus-circle"></i></span>
                        </div>
                        <div class="col-xs-2">
                          <span class="icon_circle"><i class="fa fa-plus-circle"></i></span><span class="icon_circletop flag_block"></span>
                        </div>
                     </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="row class_root" id="address">
                      <label class="padd_l3">Địa chỉ</label>
                      <div class="col-xs-12">
                        <div class="col-xs-3 padd_r" style="">
                          <div class="form-group">
                            <select class="form-control">
                              <option value="work">Work</option>
                              <option value="home">Home</option>
                              <option value="other">Other</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-6 padd_l" style="">
                          <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Số nhà, đuờng, phường xã">
                          </div>
                          <span class="spanicon"><i class="fa fa-minus-circle"></i></span>
                        </div>
                        <div class="col-xs-2">
                          <span class="icon_circle"><i class="fa fa-plus-circle"></i></span><span class="icon_circletop flag_block"></span>
                        </div>
                      </div>
                      
                    </div>
                    
                  </div>
                  
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Mã Zip">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <select class="form-control" name="district">
                          <option selected disabled>---- Chọn Quận Huyện ----</option>
                          <option value="1">Quận 2</option>
                          <option value="2">Quận 3</option>
                          <option value="3">quận 4</option>
                          <option value="4">Quận 5</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <select class="form-control" name="city">
                          <option selected disabled>---- Chọn Tỉnh/Thành ----</option>

                        </select>
                      </div>
                    </div>

                    <div class="col-md-5">
                      <div class="form-group">
                        <select class="form-control" name="country">

                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5">
                      <span>Trường tùy chỉnh</span>
                    </div>

                    <div class="col-md-5">
                      <span> <a href="">Thiết lập các trường tùy chỉnh của bạn</a></span>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-md-3">
                        <span style="float: right; line-height: 35px">Cấp Email</span>
                    </div>

                    <div class="col-md-7">
                      <div class="form-group">
                        <input type="email" class="form-control" id="new_email" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                        <span style="float: right; line-height: 35px">Cấp Password</span>
                    </div>

                    <div class="col-md-7">
                      <div class="form-group">
                        <input type="email" class="form-control" id="new_pass" placeholder="">
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-md-6">

                  <div class="row">
                    <div class="box-body pad">
                        <textarea id="editor1" name="editor1" rows="10" cols="80">

                        </textarea>
                  </div>
                </div>

                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Thẻ</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Chọn thẻ">
                      </div>
                    </div>
                  </div>

                  <div class="row" style="padding-left: 15px;">
                    <div class="form-group">
                        <input type="radio" name="r1" class="minimal" > <span style="padding-left: 5px">Tất cả</span> 
                    </div>
                    <div class="form-group">
                        <input type="radio" name="r1" class="minimal"><span style="padding-left: 5px">Chỉ tôi</span>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="r1" class="minimal"><span style="padding-left: 5px">Tôi và nhóm</span>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="r1" class="minimal" checked><span style="padding-left: 5px">Tôi và những nhân viên</span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phụ trách</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                      </div>
                    </div>
                  </div>
          
              </div>
              <!-- /.box-body -->
              <div class="clearfix"></div>
              <div class="row" style="padding: 0 15px;">
                <div class="box-footer">
                  <button type="" class="btn" style="padding-left: 10px;">Hủy</button>
                  <button type="" class="btn btn-primary" style="float: right">Lưu và thêm mới</button>
                  <button type="" class="btn btn_save" style="float: right; margin-right: 10px;">Lưu</button>
                </div>
              </div>


            </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
  </div>

@endsection()
@section('page_script')
<script type="text/javascript">
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
 //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  })
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass   : 'iradio_minimal-red'
  })
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
  $(function () {
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script src="{{url('public/dist/js/custom.js')}}"></script>
@endsection()
