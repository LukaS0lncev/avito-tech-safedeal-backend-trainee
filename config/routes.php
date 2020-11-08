<?php

define('_ROUTERS_', 
    array(
        'api' => array(
            'get' => array(
                'orders' => array(
                    'all' => 'OrdersController@all',
                    'get' => 'OrdersController@get',
                    'add' => 'OrdersController@add',
                    'delete' => 'OrdersController@delete'
                ),
                'cutomers' => array(
                    'all' => 'CustomersController@all',
                    'get' => 'CustomersController@get',
                    'add' => 'CustomersController@add',
                    'delete' => 'CustomersController@delete'
                )
            )
            
        )
    )
);

