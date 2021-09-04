@extends('master_layout')
@section('content')
{{--    {{dd($orders)}}--}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Order Code</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Số lượng SP</th>
            <th scope="col">Tổng tiền (vnđ)</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0; ?>
        @foreach($orders as $key => $order)
            <?php $stt++; ?>
            <tr>
                <th scope="row">{{$stt}}</th>
                <td style="text-transform: uppercase">{{$order->order_code}}</td>
                <td>{{$order->infoCustomer->name}}</td>
                <td>{{number_format($order->quantily, '0', ',' , '.')}}</td>
                <td>{{number_format($order->total, '0', ',' , '.')}} đ</td>
                <td>{{$order->order_date}}</td>
                <td>{{$order->note}}</td>
                <td>
                    <a href="" class="btn btn-primary">Xem</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
