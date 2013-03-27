<?php

namespace Devhelp\AnnotationsDemo\Doctrine\Annotation;

/**
* @Annotation
* @Target({"METHOD","PROPERTY"})
* @Attributes({
*   @Attribute("foo", type = "string"),
*   @Attribute("baz",  type = "boolean"),
* })
*/
class BarAnnotation
{
    protected $foo;
    protected $baz;

    public function __construct(array $values)
    {
        $this->foo = $values['foo'];
        $this->baz = $values['baz'];
    }
}
