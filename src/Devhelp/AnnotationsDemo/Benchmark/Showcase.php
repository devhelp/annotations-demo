<?php

namespace Devhelp\AnnotationsDemo\Benchmark;

use Devhelp\AnnotationsDemo\Benchmark\Annotation\Benchmark;

/**
* @Benchmark(iterations=2000)
*/
class Showcase
{
    protected $fixtures;
    
    public function __construct()
    {
        $prefix = __CLASS__.'::';
        
        $this->fixtures = array(
            $prefix.'isSetWithVarThatWasSet' => 10,
            $prefix.'isEmptyWithVarThatWasSet' => 10,
            $prefix.'isArrayOfAnArray' => array(),
            $prefix.'isArrayOfAString' => 'string',
            $prefix.'stringConcatenationUsingDotOperator' => array_fill(0, 30, 'a'),
            $prefix.'stringConcatenationUsingImplodeFunction' => array_fill(0, 30, 'a'),
            $prefix.'loopWithPreCalculatedLength' => range(0, 1000),
            $prefix.'loopWithoutPreCalculatedLength' => range(0, 1000),
            $prefix.'accessToArrayValueInForLoop' => range(0, 1000),
            $prefix.'accessToArrayValueInForeachLoop' => range(0, 1000),
        );
    }
    
    /**
     * @Benchmark
     */
    public function isSetWithVarThatWasSet()
    {
        
        isset($this->fixtures[__METHOD__]);
    }
    
    /**
     * @Benchmark
     */
    public function isEmptyWithVarThatWasSet()
    {
        empty($this->fixtures[__METHOD__]);
    }
    
    /**
     * @Benchmark
     */
    public function isSetWithVarThatWasNotSet()
    {
        isset($a);
    }
    
    /**
     * @Benchmark
     */
    public function isEmptyWithVarThatWasNotSet()
    {
        empty($a);
    }
    
    /**
     * @Benchmark
     */
    public function isArrayOfAnArray()
    {
        is_array($this->fixtures[__METHOD__]);
    }
    
    /**
     * @Benchmark
     */
    public function isArrayOfAString()
    {
        is_array($this->fixtures[__METHOD__]);
    }
    
    /**
     * @Benchmark
     */
    public function isArrayOfANonSetValue()
    {
        is_array(@$array);
    }
    
    /**
     * @Benchmark
     */
    public function emptySingleQuotedString()
    {
        '';
    }
    
    /**
     * @Benchmark
     */
    public function emptyDoubleQuotedString()
    {
        "";
    }
    
    /**
     * @Benchmark
     */
    public function singleQuotedString20Bytes()
    {
        'aaaaaaaaaaaaaaaaaaaa';
    }
    
    /**
     * @Benchmark
     */
    public function doubleQuotedString20Bytes()
    {
        "aaaaaaaaaaaaaaaaaaaa";
    }
    
    /**
     * @Benchmark
     */
    public function variablesInHeredocString()
    {
        $a = 1;
        $b = 'a';
        $c = true;
        
<<<TEXT
value of a = $a, b = $b and c = $c
TEXT;
    }
    
    /**
     * @Benchmark
     */
    public function variablesInDoubleQuotedString()
    {
        $a = 1;
        $b = 'a';
        $c = true;
        
        "value of a = $a, b = $b and c = $c";
    }
    
    /**
     * @Benchmark
     */
    public function stringConcatenationUsingDotOperator()
    {
        $this->fixtures[__METHOD__][0].
        $this->fixtures[__METHOD__][1].
        $this->fixtures[__METHOD__][2].
        $this->fixtures[__METHOD__][3].
        $this->fixtures[__METHOD__][4].
        $this->fixtures[__METHOD__][5].
        $this->fixtures[__METHOD__][6].
        $this->fixtures[__METHOD__][7].
        $this->fixtures[__METHOD__][8].
        $this->fixtures[__METHOD__][9].
        $this->fixtures[__METHOD__][10].
        $this->fixtures[__METHOD__][11].
        $this->fixtures[__METHOD__][12].
        $this->fixtures[__METHOD__][13].
        $this->fixtures[__METHOD__][14].
        $this->fixtures[__METHOD__][15].
        $this->fixtures[__METHOD__][16].
        $this->fixtures[__METHOD__][17].
        $this->fixtures[__METHOD__][18].
        $this->fixtures[__METHOD__][19];
        $this->fixtures[__METHOD__][20].
        $this->fixtures[__METHOD__][21].
        $this->fixtures[__METHOD__][22].
        $this->fixtures[__METHOD__][23].
        $this->fixtures[__METHOD__][24].
        $this->fixtures[__METHOD__][25].
        $this->fixtures[__METHOD__][26].
        $this->fixtures[__METHOD__][27].
        $this->fixtures[__METHOD__][28].
        $this->fixtures[__METHOD__][29];
    }
    
    /**
     * @Benchmark
     */
    public function stringConcatenationUsingImplodeFunction()
    {
        implode('', $this->fixtures[__METHOD__]);
    }
    
    /**
     * @Benchmark(iterations=1000)
     */
    public function loopWithPreCalculatedLength()
    {
        $array = $this->fixtures[__METHOD__];
        
        $size = count($array);
        
        for($i = 0; $i < $size; $i++);
    }
    
    /**
     * @Benchmark(iterations=1000)
     */
    public function loopWithoutPreCalculatedLength()
    {
        $array = $this->fixtures[__METHOD__];
        
        for($i = 0; $i < count($array); $i++);
    }
    
    /**
     * @Benchmark(iterations=1000)
     */
    public function accessToArrayValueInForLoop()
    {
        $array = $this->fixtures[__METHOD__];
        
        $size = count($array);
        
        for($i = 0; $i < $size; $i++) {
            $array[$i];
        }
    }
    
    /**
     * @Benchmark(iterations=1000)
     */
    public function accessToArrayValueInForeachLoop()
    {
        $array = $this->fixtures[__METHOD__];
        
        foreach($array as $value) {
            $value;
        }
    }
}