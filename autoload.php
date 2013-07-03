<?php

$loader = require_once __DIR__.'/vendor/autoload.php';

/*** ANNOTATIONS ***/

use Doctrine\Common\Annotations\AnnotationRegistry;

//AnnotationRegistry::registerFile(__DIR__."/src/Devhelp/AnnotationsDemo/Benchmark/Annotation/Benchmark.php");
//equals
//AnnotationRegistry::registerAutoloadNamespace("Devhelp\AnnotationsDemo\Benchmark\Annotation", __DIR__."/src");
//equals
AnnotationRegistry::registerLoader(array($loader, "loadClass"));