<?php

namespace Devhelp\AnnotationsDemo\Benchmark;

class BenchmarkWrapper
{
    protected $annotationReader;
    
    protected $object;
    
    protected $benchmarks = array();
    
    public function __construct(BenchmarkAnnotationReaderInterface $annotationReader)
    {
        $this->annotationReader = $annotationReader;
    }
    
    /**
     * @param type $object
     * @return \Devhelp\AnnotationsDemo\Benchmark\BenchmarkWrapper
     */
    public function wrap($object)
    {
        //read all the methods that have @Benchmark annotation
        $this->benchmarks = $this->annotationReader->getBenchmarkAnnotations($object);
        
        $this->object = $object;
        
        return $this;
    }
    
    public function __call($name, $arguments)
    {
        if(isset($this->benchmarks[$name])) {
            $start = microtime(true);
            
            $iterations = $this->benchmarks[$name]->iterations;
            
            if(!$iterations && $this->benchmarks['.default'] instanceof \Devhelp\AnnotationsDemo\Benchmark\Annotation\Benchmark) {
                $iterations = $this->benchmarks['.default']->iterations;
            }
            
            $return = null;
            
            for($i = 0; $i < $iterations; $i++) {
                $return = call_user_func_array(array($this->object, $name), $arguments);
            }
            
            $end = microtime(true);
            echo "\n".get_class($this->object)."->$name() call\t [x$iterations] took:\t " . ($end - $start) . " seconds\n";
            return $return;
        }
        else {
            return call_user_func_array(array($this->object, $name), $arguments);
        }
    }
}