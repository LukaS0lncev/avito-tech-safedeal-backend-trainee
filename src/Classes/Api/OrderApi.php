<?php
namespace Api;

class OrderApi extends Api
{
    public $apiName;

    /**
     * Метод GET
     * Вывод всех записей
     * http://ДОМЕН/api/order
     * @return string
     */
    public function indexAction()
    {
        $orders = \Models\Order::all();
        if($orders){
            return $this->response($orders, 200);
        }
        return $this->response('Data not found', 404);
    }

    /**
     * Метод GET
     * Просмотр отдельной записи (по id)
     * http://ДОМЕН/api/order/1
     * @return string
     */
    public function viewAction($id)
    {
        $order = \Models\Order::find($id);
        if($order){
            return $this->response($order, 200);
        }
        return $this->response('Data not found', 404);
    }

    /**
     * Метод POST
     * Создание новой записи
     * http://ДОМЕН/api/order + параметры запроса
     * @return string
     */
    public function createAction()
    {
        $id_customer = (int)$this->requestParams['id_customer'] ?? '';
        if(empty($id_customer) || !is_int($id_customer))
        {
            return $this->response("Saving error", 500);
        } else {
            $parameter = array('id_customer' => $id_customer);
            $order = \Models\Order::save($parameter);
            return $this->response('Data saved.', 200);
        }
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
