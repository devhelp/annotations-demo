<?php

require_once 'vendor/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

$loader->registerNamespaceFallback(__DIR__.'/src');

$loader->register();

/*** ANNOTATIONS ***/

/*** doctrine ***/

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

//AnnotationRegistry::registerFile(__DIR__."/src/Devhelp/AnnotationsDemo/Benchmark/Annotation/Benchmark.php");
//equals
//AnnotationRegistry::registerAutoloadNamespace("Devhelp\AnnotationsDemo\Benchmark\Annotation", __DIR__."/src");
//equals
//AnnotationRegistry::registerAutoloadNamespace("Devhelp\AnnotationsDemo\Benchmark\Annotation", __DIR__."/src");
AnnotationRegistry::registerLoader(array($loader, "loadClass"));
AnnotationReader::addGlobalIgnoredName('dummy');
AnnotationReader::addGlobalIgnoredName('dummy');
AnnotationReader::addGlobalIgnoredName('dummy');

/*** doctrine ***/

/*** php-annotatinos ***/

new Mindplay\Annotation\AnnotationManager();
 
/*** php-annotatinos ***/