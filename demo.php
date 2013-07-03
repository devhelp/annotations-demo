<?php

require_once __DIR__.'/autoload.php';

use Doctrine\Common\Annotations\AnnotationReader;

use Devhelp\AnnotationsDemo\Benchmark\BenchmarkWrapper;
use Devhelp\AnnotationsDemo\Benchmark\Doctrine\BenchmarkAnnotationReader;
use Devhelp\AnnotationsDemo\Benchmark\Showcase;


$annotationReader = new AnnotationReader();
$benchmarkAnnotationReader = new BenchmarkAnnotationReader($annotationReader);

$showcase = new Showcase();

$wrapper = new BenchmarkWrapper($benchmarkAnnotationReader);
$wrapper->wrap($showcase);

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
$wrapper->accessToArrayValueInForeachWithKeyVariableLoop();
$wrapper->accessToArrayValueByReferenceInForeachLoop();
