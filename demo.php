<?php

require_once 'autoload.php';

use Devhelp\AnnotationsDemo\Benchmark\BenchmarkDemo;
use Devhelp\AnnotationsDemo\Benchmark\TestAnnotationEngineDecorator;
use Devhelp\AnnotationsDemo\Benchmark\Doctrine\DoctrineAnnotationEngineDecorator;
use Devhelp\AnnotationsDemo\Benchmark\Showcase;

$engineToRun = @$argv[1] ? $argv[1] : 'default';

switch($engineToRun)
{
    case 'doctrine' :
        $reader = new Doctrine\Common\Annotations\AnnotationReader();
        $engine = new DoctrineAnnotationEngineDecorator($reader);
        break;
    case 'test':
        $engine = new TestAnnotationEngineDecorator();
        break;
    default:
        $engine = new TestAnnotationEngineDecorator();
}

$container = new BenchmarkDemo($engine);

$showcase = new Showcase();

$wrapped = $container->wrap($showcase);

$wrapped->foo();
$wrapped->bar();