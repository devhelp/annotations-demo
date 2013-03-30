<?php

namespace Devhelp\AnnotationsDemo\Benchmark\Doctrine;

use Devhelp\AnnotationsDemo\Benchmark\AnnotationEngineInterface;

class MindplayAnnotationEngineDecorator implements AnnotationEngineInterface
{   
    public function __construct()
    {
        
    }
    
    public function getBenchmarkAnnotations($object)
    {
        $benchmarkAnnotations = array();
        
        $reflClass = new \ReflectionClass($object);
        
        $benchmarkAnnotations['.default'] = $this->getDefaultBenchmark($reflClass);
        
        foreach($reflClass->getMethods() as $reflMethod) {
            $benchmarkAnnotation = $this->reader->getMethodAnnotation($reflMethod, 'Devhelp\AnnotationsDemo\Benchmark\Annotation\Benchmark');
            
            if($benchmarkAnnotation) {
                $benchmarkAnnotations[$reflMethod->name] = $benchmarkAnnotation;
            }
        }
        
        return $benchmarkAnnotations;
    }
    
    protected function getDefaultBenchmark(\ReflectionClass $reflClass)
    {
        return $this->reader->getClassAnnotation($reflClass, 'Devhelp\AnnotationsDemo\Benchmark\Annotation\Benchmark');
    }
}