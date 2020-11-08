<?php

define('_ROUTERS_', 
    array(
        'get' => array(
            'api' => array(
                'orders' => array(
                    'all' => '\Controllers\OrdersController@all',
                    'get/{id_order}' => '\Controllers\OrdersController@get',
                    'add' => '\Controllers\OrdersController@add',
                    'delete' => '\Controllers\OrdersController@delete'
                ),
                'cutomers' => array(
                    'all' => '\Controllers\CustomersController@all',
                    'get/{id_customer}' => '\Controllers\CustomersController@get',
                    'add' => '\Controllers\CustomersController@add',
                    'delete' => '\Controllers\CustomersController@delete'
                )
            )
            
        )
    )
);

