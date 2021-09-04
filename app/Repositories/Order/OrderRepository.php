<?php
namespace App\Repositories\Order;

use App\Repositories\BaseRepository;
use Session;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    //lay model tuong ung
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Models\Order::class;
    }
    //method
    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return $this->model->with('infoCustomer')->orderby('id','DESC')->get();
    }
    //store
    public function storeOrder($data){
        $cart = Session::get('cart');
        if($cart){
            if(!Session::get('order_code')){
                $order_code = substr(md5(microtime()),rand(0,26),8);
                // dd($order_code);
                Session::put('order_code',$order_code);
            }
            $qty = 0;
            $total = 0;
            foreach ($cart as $key => $c){
                $qty += $c['product_quantily'];
                $total += $c['product_quantily'] * $c['product_price'];
            }
            return $this->model->create(array(
                'id_customer' => $data["customer"],
                'order_code' => Session::get("order_code"),
                'quantily' => $qty,
                'total' => $total,
                'order_date' => $data["date"],
                'note' => $data['note'],
            ));
        }
    }
}
