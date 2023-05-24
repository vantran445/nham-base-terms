<?php namespace VanTran\NhamBaseTerms\Terms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Star;

class StarTest extends TestCase
{
    /**
     * @var Star
     */
    private $stars;

    public function setup(): void
    {
        $this->stars = new Star();
    }

    /**
     * @covers Star
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingleton(): void
    {
        $term1 = $this->stars->term('xa');
        $term2 = $this->stars->term(2);

        $this->assertTrue($term1 === $term2);
    }

    /**
     * @covers Star
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testMagicMethod(): void
    {
        $this->assertTrue($this->stars->term(10) === $this->stars->vu());
    }

    /**
     * @covers Star
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testMagicProp(): void
    {
        $this->assertTrue($this->stars->term(7) === $this->stars->khong);
    }

    /**
     * @covers Star
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testException(): void
    {
        $this->expectException(Exception::class);
        $this->stars->term(13);
    }

    /**
     * @covers Star
     * 
     * @return void 
     * @throws ExpectationFailedException 
     */
    public function testFailure(): void
    {
        $this->assertNull($this->stars->hello());
    }
}