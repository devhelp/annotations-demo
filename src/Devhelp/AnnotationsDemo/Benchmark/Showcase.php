<?php

namespace Devhelp\AnnotationsDemo\Benchmark;

use Devhelp\AnnotationsDemo\Benchmark\Doctrine\Annotation as Demo;

class Showcase
{
    /**
     * @Demo\Benchmark(iterations=5)
     */
    public function foo()
    {
        var_dump(__METHOD__);
    }
    
    /**
     * @Demo\Benchmark(iterations=10)
     */
    public function bar()
    {
        var_dump(__METHOD__);
    }    
}