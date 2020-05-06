<?php

function modules_path($name,$path=''){
    if(substr($path,0,1) != '/'){
        $path = '/'.$path;
    }
    return app_path('Modules/'.ucfirst($name)).$path;
}

function modules_config($module,$key,$default=null){
    return config(strtolower($module).'.'.$key,$default);
}

