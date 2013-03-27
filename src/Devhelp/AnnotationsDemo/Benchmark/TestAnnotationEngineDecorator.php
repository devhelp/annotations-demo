<?php

namespace Devhelp\AnnotationsDemo\Benchmark;

use Devhelp\AnnotationsDemo\Benchmark\AnnotationEngineInterface;

class TestAnnotationEngineDecorator implements AnnotationEngineInterface
{   
    public function getBenchmarkAnnotations($object)
    {
        $benchmark = new Doctrine\Annotation\Benchmark();
        $benchmark->iterations = 10;
        
        return array('foo' => $benchmark);
    }
}