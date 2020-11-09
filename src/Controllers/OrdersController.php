<?php
namespace Controllers;

use \Models\Order;

class OrdersController extends ControllerCore
{
    public function get(array $parameters = array())
    {
        $id_order = $parameters['id_order'];
        $order = Order::find($id_order);
        if($order) {
            echo parent::response($order, 200);
        }
        else {
            echo parent::response($order, 404);
        }
    }
}