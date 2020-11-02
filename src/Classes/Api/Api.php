<?php
namespace Api;

abstract class Api
{
    
    public $apiName = ''; //users
    protected $apiId = '';
    protected $method = ''; //GET|POST|PUT|DELETE
    protected $requestUri = [];
    protected $requestParams = [];
    protected $action = ''; //Название метод для выполнения

    public function __construct() {
        $route = new \Tools\Route();
        $this->method = $route->getMethod();
        $this->requestUri = $route->getRequestUri();
        $this->requestParams = $route->getRequestParams();
    }

    public function run() {
        //Первые 2 элемента массива URI должны быть "api" и название таблицы
        if(array_shift($this->requestUri) !== 'api' || array_shift($this->requestUri) !== $this->apiName){
            throw new \RuntimeException('API Not Found', 404);
        }
        //Определение действия для обработки
        $this->action = $this->getAction();

        //Если метод(действие) определен в дочернем классе API
        if (method_exists($this, $this->action)) {
            return $this->{$this->action}();
        } else {
            throw new \RuntimeException('Invalid Method', 405);
        }
    }

    /**
     * Возвращаем json строку и устанавливаем статус ответа в заголовок
     * @return string
     */
    protected function response($data, $status = 500) {
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        return json_encode($data);
    }

    /**
     * Возвращаем статус по коду
     * @return string
     */
    private function requestStatus($code) {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code])?$status[$code]:$status[500];
    }

    /**
     * Получаем тип события
     * @return string
     */
    protected function getAction()
    {
        $method = $this->method;
        switch ($method) {
            case 'GET':
                if($this->requestUri){
                    $this->apiId = $this->requestUri[0];
                    return 'viewAction';
                } else {
                    return 'indexAction';
                }
                break;
            case 'POST':
                return 'createAction';
                break;
            case 'PUT':
                return 'updateAction';
                break;
            case 'DELETE':
                return 'deleteAction';
                break;
            default:
                return null;
        }
    }

    /**
     * Вызываем нужный нам API
     * @return Object
     */
    public function getApi($apiName = false)
    {
        switch ($apiName) {
            case 'order':
                $api = new OrderApi();
                $api->apiName = $apiName;
                return $api;
        }
    }
}
