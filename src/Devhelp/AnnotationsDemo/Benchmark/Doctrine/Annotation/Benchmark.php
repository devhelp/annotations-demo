<?php

namespace Devhelp\AnnotationsDemo\Benchmark\Doctrine\Annotation;

/**
 * @Annotation
 * @Target({"METHOD"})
 */
class Benchmark
{
    /** @var integer */
    public $iterations = 1;
}