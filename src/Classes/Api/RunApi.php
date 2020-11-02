<?php
namespace Api;

class RunApi extends Api
{
    public $apiName;

    /**
     * Метод GET
     * Вывод всех записей
     * http://ДОМЕН/api/table
     * @return string
     */
    public function indexAction()
    {
        
        $api = $this->getApi($this->apiName);
        $response = $api->indexAction();
        echo $response;
    }

    /**
     * Метод GET
     * Просмотр отдельной записи (по id)
     * http://ДОМЕН/api/table/1
     * @return string
     */
    public function viewAction()
    {
        $api = $this->getApi($this->apiName);
        $response = $api->viewAction($this->apiId);
        echo $response;
    }

    /**
     * Метод POST
     * Создание новой записи
     * http://ДОМЕН/api/table + параметры запроса
     * @return string
     */
    public function createAction()
    {
        $api = $this->getApi($this->apiName);
        $response = $api->createAction($this->apiId);
        echo $response;
    }

    /**
     * coming soon
     */
    public function updateAction()
    {
        echo 'updateAction';
    }

    /**
     * coming soon
     */
    public function deleteAction()
    {
        echo 'deleteAction';
    }
}
