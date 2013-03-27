<?php

namespace Devhelp\AnnotationsDemo\Benchmark;

class BenchmarkWrapper
{
    protected $annotationEngine;
    
    protected $object;
    
    protected $benchmarks = array();
    
    public function __construct(AnnotationEngineInterface $annotationEngine)
    {
        $this->annotationEngine = $annotationEngine;
    }
    
    /**
     * @param type $object
     * @return \Devhelp\AnnotationsDemo\Benchmark\BenchmarkWrapper
     */
    public function wrap($object)
    {
        //read all the methods that have @Benchmark annotation
        $this->benchmarks = $this->annotationEngine->getBenchmarkAnnotations($object);
        
        $this->object = $object;
        
        return $this;
    }
    
    public function __call($name, $arguments)
    {
        if(isset($this->benchmarks[$name])) {
            $start = microtime(true);
            
            $iterations = $this->benchmarks[$name]->iterations;
            for($i = 0; $i < $iterations; $i++) {
                $return = call_user_func_array(array($this->object, $name), $arguments);
            }
            
            $end = microtime(true);
            echo get_class($this->object)."->$name() call [x$iterations] took: " . ($end - $start) . " miliseconds\n";
            return $return;
        }
        else {
            return call_user_func_array(array($this->object, $name), $arguments);
        }
    }
}