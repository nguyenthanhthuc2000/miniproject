<?php

namespace App\Repositories\Order;

use App\Repositories\BaseRepository;
use Session;

class OrderDetailRepository extends BaseRepository
{
    //lay model tuong ung
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Models\OrderDetail::class;
    }

    //
    public function storeOrderDetail()
    {
        $cart = Session::get('cart');
        if ($cart) {
            foreach ($cart as $key => $c) {
                $order_detail = array(
                    'order_code' => Session::get("order_code"),
                    'id_product' => $c["product_id"],
                    'quantily' => $c["product_quantily"],
                );
                $query = $this->model->create($order_detail);
            }
        }
        return $query;
    }

}
