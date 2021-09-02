@extends('master_layout')
@section('content')
<div class="box-button">
  <h2 class="del">Giỏ hàng</h2>
  <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success"><i class="fas fa-user-plus"></i>&nbsp Add product</button>
</div>
@if(Session::get('order_code'))
    code: {{Session::get('order_code')}}
@endif
<form action="" method="POST">
  @csrf
  <div class="table-responsive" >
    <table class="table">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Giá bán</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Thành tiền</th>
          <th scope="col">Thao tác</th>
        </tr>
      </thead>
      <tbody id="load-html">

      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-6">
      <select class="form-select option-customer" aria-label="Default select example">
        <option selected>Chọn khách hàng</option>
        @foreach($getCustomers as $key => $getCustomer)
        <option value="{{$getCustomer->id}}">{{$getCustomer->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
    <table class="table">
      <tbody>
        <tr>
          <td>Tổng tiền</td>
          <td id="total" style="text-align: end;">0</td>
        </tr>
        <tr>
          <td>Thao tác</td>
          <td style="text-align: end;"><button type="button" class="btn btn-success create-order">Tạo đơn hàng</button></td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
</form>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Danh sách sản phẩm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data" id="create-customer">
        <div class="modal-body">

            <div class="row">
                @foreach($getProducts as $key => $getProduct)
                <div class="col-md-4 col-6 pt-2">
                    <div class="card">
                        <div class="box-img">
                            <img class="img__products__add__cart" src="{{URL::to('public/uploads/products/'.$getProduct->photo)}}" class="card-img-top" alt="{{$getProduct->name}}">
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">{{$getProduct->name}}</h5>
                        <p class="card-text">Giá: {{number_format($getProduct->price,'0',',','.')}} vnđ</p>
                        <button type="button" data-id="{{$getProduct->id}}" class="btn btn-success add-cart">Mua ngay</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('script_function')
    <script>

        $(document).ready(function(){
            //load tong tien
            loadTotal();
            function loadTotal(){
                $.ajaxSetup({
                    headers : {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : route('order-detail-manager.loadTotal'),
                    method : 'POST',
                    success : function(data){
                        $('#total').html(data);
                    }
                })
            }

            //load gia sau khi update sl
            function loadPrice(id , price , qty) {
                $.ajaxSetup({
                    headers : {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : route('order-detail-manager.loadPrice'),
                    method : 'POST',
                    data : {id : id, price : price , qty : qty},
                    success : function(data){
                        $('#id_'+id).html(data);
                        loadTotal();
                    }
                })
            }

            //update gia sau khi update sl
            $(document).on('keyup mouseup', '.input-number', function() {
                $.ajaxSetup({
                    headers : {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                const id = $(this).data('id');
                const qty = $(this).val();
                const price = $(this).data('price');
                $.ajax({
                    url : route('order-detail-manager.updateQuantily'),
                    method : 'POST',
                    data : {id : id, qty : qty},
                    success : function(data){
                        loadPrice(id , price , qty);
                    }
                })
            });

            //show sp trong gio hang
            getProductInCart();
            function getProductInCart(){
              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url : route('cart.getCart'),
                method : 'POST',
                success : function(data){
                  $('#load-html').html(data);
                    loadTotal();
                }
              })
            }
            //xoa sp khoi gio hang
            $(".table").on("click", ".btn-del",function(){
                const id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                  url : route('order-detail-manager.delCart'),
                  method : 'POST',
                  data : {id:id},
                  success :function(data){
                    getProductInCart();
                      loadTotal();
                  }
                })
              })

            //them sp vao gio hang
            $('.add-cart').click(function(){
                $.ajaxSetup({
                    headers : {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });
                const id = $(this).data('id');
                const quantily = 1;
                $.ajax({
                    url : route('order-detail-manager.addCart'),
                    method : 'POST',
                    data : {id:id,quantily:quantily},
                    success : function(data){
                          swal("Good job!","Thêm vào giỏ hàng thành công!","success");
                          getProductInCart();
                    },
                    error : function(data){
                          swal("Error!","Thử lại sau!","error");
                    }
                })
            })
        })
    </script>
@endsection
