<?php

require_once 'autoload.php';

use Devhelp\AnnotationsDemo\Benchmark\BenchmarkDemo;
use Devhelp\AnnotationsDemo\Benchmark\TestAnnotationEngineDecorator;
use Devhelp\AnnotationsDemo\Benchmark\Doctrine\DoctrineAnnotationEngineDecorator;
use Devhelp\AnnotationsDemo\Benchmark\Showcase;

$engineToRun = @$argv[1] ? $argv[1] : 'default';

switch ($engineToRun) {
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

$demo = new BenchmarkDemo($engine);

$showcase = new Showcase();

$wrapper = $demo->wrap($showcase);

$wrapper->isSetWithVarThatWasSet();
$wrapper->isEmptyWithVarThatWasSet();
$wrapper->isSetWithVarThatWasNotSet();
$wrapper->isEmptyWithVarThatWasNotSet();
$wrapper->isArrayOfAnArray();
$wrapper->isArrayOfAString();
$wrapper->isArrayOfANonSetValue();

$wrapper->emptySingleQuotedString();
$wrapper->emptyDoubleQuotedString();
$wrapper->singleQuotedString20Bytes();
$wrapper->doubleQuotedString20Bytes();
$wrapper->variablesInHeredocString();
$wrapper->variablesInDoubleQuotedString();
$wrapper->stringConcatenationUsingDotOperator();
$wrapper->stringConcatenationUsingImplodeFunction();

$wrapper->loopWithPreCalculatedLength();
$wrapper->loopWithoutPreCalculatedLength();
$wrapper->accessToArrayValueInForLoop();
$wrapper->accessToArrayValueInForeachLoop();
