<?php
namespace Api;

use Models\Order;

class RunApi extends Api
{
    public $apiName;

    public function indexAction()
    {
        
        $api = $this->getApi($this->apiName);
        $api->indexAction();
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
