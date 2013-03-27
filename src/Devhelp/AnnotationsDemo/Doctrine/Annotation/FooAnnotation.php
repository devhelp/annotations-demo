<?php

namespace Devhelp\AnnotationsDemo\Doctrine\Annotation;

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