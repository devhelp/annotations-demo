<?php

namespace Devhelp\AnnotationsDemo\Benchmark;

interface AnnotationEngineInterface
{
    public function getBenchmarkAnnotations($object);
}