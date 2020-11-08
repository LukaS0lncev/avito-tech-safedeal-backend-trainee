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
        foreach(_ROUTERS_ as $key_method => $route_lvl_1)
        {
            if(mb_strtoupper($key_method) == $method)
            {
                foreach($route_lvl_1 as $key_group => $route_lvl_2)
                {
                    if($key_group == $request_uri[0])
                    {
                        array_shift($request_uri);
                        if(!$request_uri) break;
                        
                        foreach($route_lvl_2 as $key_model => $route_lvl_3)
                        {
                            if($key_model == $request_uri[0])
                            {
                                array_shift($request_uri);
                                if(!$request_uri){
                                    //статус ошибки потом изменить, тк здесь не соответствие параметров
                                    $results = array(
                                        'code' => 404,
                                        'status' => 'Not Found',
                                        'method' => $method,
                                        'request_params' => $this->request_params
                                    );
                                    return $results;
                                } 
                                foreach($route_lvl_3 as $key_func => $value)
                                {
                                    $check_path = $this->checkPath($key_func, $this->request_params);
                                    if($check_path)
                                    {
                                        if(array_shift($check_path) == $request_uri[0])
                                        {
                                            array_shift($request_uri);
                                            $parameters = $this->getParameters($check_path, $request_uri);
                                            if(!$parameters) break;
                                            $controller_function = explode('@',$value);
                                            $results = array(
                                                'code' => 200,
                                                'status' => 'OK',
                                                'controller' => $controller_function[0],
                                                'function' => $controller_function[1],
                                                'method' => $method,
                                                'parameters' => $parameters,
                                                'request_params' => $this->request_params
                                            );
                                            return $results;
                                        }
                                    }
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
                                //die;
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

    protected function checkPath(string $path = '')
    {
        if(strripos($path, '/')) {
            $path_array = explode('/',$path);
            return $path_array;
        }
        else {
            return false;
        }
    }

    protected function getParameters(array $path_key = array(), array $request_uri = array())
    {
        if(count($path_key) == count($request_uri)){
            $func = function($value) {
                //поменять на регулярку
                $value = str_replace("{", "", $value);
                $value =  str_replace("}", "", $value);
                return $value;
            };
            $path_key = array_map($func, $path_key);
            return array_combine($path_key, $request_uri);
        }
        else {
            return false;
        }
    }
}