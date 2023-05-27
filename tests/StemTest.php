<?php namespace VanTran\NhamBaseTerms\Terms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Stem;

class StemTest extends TestCase
{
    /**
     * @var Stem
     */
    private $stems;

    public function setup(): void
    {
        $this->stems = new Stem();
    }

    /**
     * @covers Stem
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingleton(): void
    {
        $term1 = $this->stems->term('b');
        $term2 = $this->stems->term(1);

        $this->assertTrue($term1 === $term2);
    }

    /**
     * @covers Stem
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testMagicMethod(): void
    {
        $this->assertTrue($this->stems->term(9) === $this->stems->quy());
    }

    /**
     * @covers Stem
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testMagicProp(): void
    {
        $this->assertTrue($this->stems->term(6) === $this->stems->canh);
    }

    /**
     * @covers Stem
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testException(): void
    {
        $this->expectException(Exception::class);
        $this->stems->term(11);
    }
}