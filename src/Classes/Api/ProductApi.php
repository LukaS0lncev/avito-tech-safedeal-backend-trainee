<?php
namespace Api;

class ProductApi extends Api
{
    public $apiName;

    public function indexAction()
    {
        echo 'product indexAction';
    }

    public function viewAction($id)
    {
        echo 'product viewAction';
    }

    public function createAction()
    {
        echo 'product createAction';
    }

    public function updateAction()
    {
        echo 'product updateAction';
    }

    public function deleteAction()
    {
        echo 'product deleteAction';
    }
}
