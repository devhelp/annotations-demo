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
    
//    //this will not work      
//    public function setIterations($iterations)
//    {
//        //do something
//    }
}