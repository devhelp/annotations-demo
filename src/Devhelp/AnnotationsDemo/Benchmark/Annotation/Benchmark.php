<?php

namespace Devhelp\AnnotationsDemo\Benchmark\Annotation;

/**
 * @Annotation
 * @Target({"METHOD", "CLASS"})
 */
class Benchmark
{
    /** @var integer */
    public $iterations = 0;
    
//    //sadly, this will not work      
//    public function setIterations($iterations)
//    {
//        $this->iterations = 2*$iterations;
//    }
}