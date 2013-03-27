<?php

namespace Devhelp\AnnotationsDemo\Benchmark;

class BenchmarkDemo
{
    protected $annotationEngine;
    
    public function __construct(AnnotationEngineInterface $annotationEngine)
    {
        $this->annotationEngine = $annotationEngine;
    }    
    
    public function wrap($object)
    {
        $wrapper = new BenchmarkWrapper($this->annotationEngine);
        
        return $wrapper->wrap($object);
    }
}
