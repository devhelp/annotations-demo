<?php

namespace Devhelp\AnnotationsDemo\Doctrine\ExampleAnnotation;

/**
 * @Annotation
 * @Target({"METHOD", "PROPERTY"})
 */
class FooAnnotation
{
    /** @var boolean */
    public $bar;
    /** @var float */
    public $baz;
}