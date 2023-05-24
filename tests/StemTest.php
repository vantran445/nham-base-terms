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
        $term1 = $this->stems->term('at');
        $term2 = $this->stems->term(2);

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
        $this->assertTrue($this->stems->term(10) === $this->stems->rainwater());
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
        $this->assertTrue($this->stems->term(7) === $this->stems->hardmetal);
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
        $this->stems->term(12);
    }

    /**
     * @covers Stem
     * 
     * @return void 
     * @throws ExpectationFailedException 
     */
    public function testFailure(): void
    {
        $this->assertNull($this->stems->hello());
    }
}