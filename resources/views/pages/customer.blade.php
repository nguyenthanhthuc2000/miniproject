@extends('master_layout')
@section('content')
<div class="box-button">
  <h2>Khách hàng</h2>
  <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success"><i class="fas fa-user-plus"></i>&nbsp;Create</button>
</div>
<div class="table-responsive" >
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Avatar</th>
        <th scope="col">Tên</th>
        <th scope="col">Điện thoại</th>
        <th scope="col">Email</th>
        <th scope="col">Địa chỉ</th>
      </tr>
    </thead>
    <tbody id="load-html">
      
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Thông tin khách hàng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data" id="create-customer">
        <div class="modal-body">
        
            <div class="row">
              <div class="col-md-6 col-12">
                <input type="file" class="input-file avatar"  onchange="review_img(event)">
                <div class="img create-avatar ">
                    <img id="review-img" src="{{URL::to('public/images/upload.png')}}" alt="">
                    <p>Ảnh đại diện</p>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="box-form">
                <label for="inputAddress" class="form-label">Họ và tên</label>
                <input type="text" class="form-control name" id="inputAddress" name="name" placeholder="Nhập họ và tên">
              </div>
                <div class="box-form">
                <label for="inputAddress" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control phone" id="inputAddress" name="phone"placeholder="Nhập số điện thoại">
              </div>
              <div class="box-form">
                <label for="inputAddress" class="form-label">Địa chỉ email</label>
                <input type="text" class="form-control email" id="inputAddress" name="email"placeholder="Nhập địa chỉ email">
              </div>
              <div class="box-form">
                <label for="inputAddress" class="form-label">Địa chỉ giao hàng</label>
                <textarea type="text" class="form-control address" id="inputAddress" name="address"placeholder="Nhập địa chỉ giao hàng"> </textarea>
              </div>
              </div>
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary btn-create">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('script_function')
  <script type="text/javascript">
    let review_img = function(event){
          let img = document.getElementById('review-img');
          img.src = URL.createObjectURL(event.target.files[0]);
          img.onload = function(){
              URL.revokeObjectURL(img.src);
          }
      }
    $(document).ready(function(){
      fetch_customer();
      function fetch_customer(){
        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            url: route('customer-manager.getCustomer'),
            method: 'POST',
            success:function(data){
                $('#load-html').html(data);
            }
        });
      }

      $('#review-img').click(function(){
        $('.input-file').click();
      })

      $('form').submit(function(event) {
        event.preventDefault();
        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var fData = new FormData();
        fData.append('file', $('.avatar' )[0].files[0] );
        fData.append('name', $('.name').val());
        fData.append('phone',$('.phone').val());
        fData.append('email', $('.email').val());
        fData.append('address', $('.address').val());
        $.ajax({
            url: route('customer-manager.store'),
            data: fData,
            type: 'POST',
            processData: false,
            contentType: false,
            success:function ( data ) {
                if(data == 2){
                  $('#create-customer')[0].reset();
                  $("#review-img").attr("src","{{URL::to('public/images/upload.png')}}");
                  $('#staticBackdrop').modal('toggle');
                  swal("Error!", "Số điện thoại đã tồn tại!", "error");
                }
                else{
                  $('#staticBackdrop').modal('toggle');
                  swal("Good job!", "Thêm khách hàng thành công!", "success");
                  fetch_customer();
                }
            },
            error: function(data){
              $("#review-img").attr("src","{{URL::to('public/images/upload.png')}}");
                $('#create-customer')[0].reset();
                $('#staticBackdrop').modal('toggle');
                swal("Error!", "Thử lại sau!", "error");
            }
        });
      })
    
    })
  </script>

@endsection