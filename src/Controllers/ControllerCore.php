<?php
namespace Controllers;

class ControllerCore
{
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
}