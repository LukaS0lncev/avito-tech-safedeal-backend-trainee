<?php
namespace Api;

class CustomerApi extends Api
{
    public $apiName;

    public function indexAction()
    {
        echo 'customer indexAction';
    }

    public function viewAction($id)
    {
        echo 'customer viewAction';
    }

    public function createAction()
    {
        echo 'customer createAction';
    }

    public function updateAction()
    {
        echo 'customer updateAction';
    }

    public function deleteAction()
    {
        echo 'customer deleteAction';
    }
}
