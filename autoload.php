<?php

require_once 'vendor/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

$loader->registerNamespaceFallback(__DIR__.'/src');

$loader->register();

/*** doctrine ***/

use Doctrine\Common\Annotations\AnnotationRegistry;

//AnnotationRegistry::registerFile(__DIR__."/src/Devhelp/AnnotationsDemo/Benchmark/Doctrine/Annotation/Benchmark.php");
//equals
//AnnotationRegistry::registerAutoloadNamespace("Devhelp\AnnotationsDemo\Benchmark\Doctrine\Annotation", __DIR__."/src");
//equals
//AnnotationRegistry::registerAutoloadNamespace("Devhelp\AnnotationsDemo\Benchmark\Doctrine\Annotation", __DIR__."/src");
AnnotationRegistry::registerLoader(array($loader, "loadClass"));

/*** doctrine ***/