<?php

namespace Devhelp\AnnotationsDemo\Benchmark\Doctrine;

use Devhelp\AnnotationsDemo\Benchmark\AnnotationEngineInterface;
use Doctrine\Common\Annotations\AnnotationReader;

class DoctrineAnnotationEngineDecorator implements AnnotationEngineInterface
{   
    protected $reader;
    
    public function __construct(AnnotationReader $reader)
    {
        $this->reader = $reader;
    }
    
    public function getBenchmarkAnnotations($object)
    {
        $benchmarkAnnotations = array();
        
        $reflClass = new \ReflectionClass($object);
        
        $benchmarkAnnotations['.default'] = $this->getDefaultBenchmark($reflClass);
        
        foreach($reflClass->getMethods() as $reflMethod) {
            $benchmarkAnnotation = $this->reader->getMethodAnnotation($reflMethod, 'Devhelp\AnnotationsDemo\Benchmark\Doctrine\Annotation\Benchmark');
            
            if($benchmarkAnnotation) {
                $benchmarkAnnotations[$reflMethod->name] = $benchmarkAnnotation;
            }
        }
        
        return $benchmarkAnnotations;
    }
    
    protected function getDefaultBenchmark(\ReflectionClass $reflClass)
    {
        return $this->reader->getClassAnnotation($reflClass, 'Devhelp\AnnotationsDemo\Benchmark\Doctrine\Annotation\Benchmark');
    }
}