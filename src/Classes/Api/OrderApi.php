<?php
namespace Api;

class OrderApi extends Api
{
    public $apiName;

    public function indexAction()
    {
        $orders = \Models\Order::all();
        if($orders){
            return $this->response($orders, 200);
        }
        return $this->response('Data not found', 404);
    }

    public function viewAction()
    {
        echo 'viewAction';
    }

    public function createAction()
    {
        echo 'createAction';
    }

    public function updateAction()
    {
        echo 'updateAction';
    }

    public function deleteAction()
    {
        echo 'deleteAction';
    }
}
