<?php
namespace Routes;

class Route extends Request
{
    public function run()
    {
        $parameters = $this->getParametersApi();
        
        return $parameters;
    }

    public function getParametersApi()
    {
        $request_uri = $this->request_uri;
        $method = $this->method;
        foreach(_ROUTERS_ as $key_group => $route_lvl_1)
        {
            if($key_group == $request_uri[0])
            {
                array_shift($request_uri);
                foreach($route_lvl_1 as $key_method => $route_lvl_2)
                {
                    if(mb_strtoupper($key_method) == $method)
                    {
                        foreach($route_lvl_2 as $key_model => $route_lvl_3)
                        {
                            if($key_model == $request_uri[0])
                            {
                                array_shift($request_uri);
                                foreach($route_lvl_3 as $key_func => $value)
                                {
                                    if($key_func == $request_uri[0])
                                    {
                                        array_shift($request_uri);
                                        $controller_function = explode('@',$value);
                                        $results = array(
                                            'code' => 200,
                                            'status' => 'OK',
                                            'controller' => $controller_function[0],
                                            'function' => $controller_function[1],
                                            'method' => $method,
                                            'parameters' => $request_uri ? $request_uri[0] : null,
                                            'request_params' => $this->request_params
                                        );
                                        return $results;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $results = array(
            'code' => 404,
            'status' => 'Not Found',
            'method' => $method,
            'request_params' => $this->request_params
        );
        return $results;
    }
}