<?php

namespace Devhelp\AnnotationsDemo\Benchmark;

interface BenchmarkAnnotationReaderInterface
{
    public function getBenchmarkAnnotations($object);
}