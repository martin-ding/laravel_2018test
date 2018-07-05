<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReflectionController extends Controller
{
    public function test()
    {
    	$class = new \ReflectionClass(PostController::class);
    	// dd($class->getMethods());
    	$method = $class->getMethod("show");
    	$params = $method->getParameters();
    	dd($params[0]->getType());
    }
}


class ParentClass { protected static $a = 'a'; static public function init() { return static::$a; } } 
class ChildClass extends ParentClass { protected static $a = 'b'; } 
    
$r = new ReflectionClass('ChildClass'); 
var_dump($r->getMethod('init')->invoke(null)); 
