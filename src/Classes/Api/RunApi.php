<?php
namespace Api;

class RunApi extends Api
{
    public $apiName;

    public function indexAction()
    {
        
        $api = $this->getApi($this->apiName);
        $response = $api->indexAction();
        echo $response;
    }

    public function viewAction()
    {
        $api = $this->getApi($this->apiName);
        $response = $api->viewAction($this->apiId);
        echo $response;
    }

    public function createAction()
    {
        $api = $this->getApi($this->apiName);
        $response = $api->createAction($this->apiId);
        echo $response;
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
