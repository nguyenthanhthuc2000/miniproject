<?php
namespace App\Repositories\Order;

use App\Repositories\RepositoryInterface;

interface OrderRepositoryInterface extends RepositoryInterface
{
    //Viết Interface và Repository cho Model tương ứng.
//   public function storeOrder();

    public function getOrder();
}
