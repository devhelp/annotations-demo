<?php

namespace Devhelp\AnnotationsDemo\Benchmark\Doctrine;

use Devhelp\AnnotationsDemo\Benchmark\BenchmarkAnnotationReaderInterface;
use Doctrine\Common\Annotations\AnnotationReader;

class BenchmarkAnnotationReader implements BenchmarkAnnotationReaderInterface
{   
    
    const BENCHMARK_ANNOTATION = 'Devhelp\AnnotationsDemo\Benchmark\Annotation\Benchmark';
    
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
            $benchmarkAnnotation = $this->reader->getMethodAnnotation($reflMethod, static::BENCHMARK_ANNOTATION);
            
            if($benchmarkAnnotation) {
                $benchmarkAnnotations[$reflMethod->name] = $benchmarkAnnotation;
            }
        }
        
        return $benchmarkAnnotations;
    }
    
    protected function getDefaultBenchmark(\ReflectionClass $reflClass)
    {
        return $this->reader->getClassAnnotation($reflClass, static::BENCHMARK_ANNOTATION);
    }
}