<?php
namespace App\Repositories\Order;

use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    //lay model tuong ung
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Models\Order::class;
    }
    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return $this->model->select()->get();
    }
}
