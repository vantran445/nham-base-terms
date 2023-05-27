<?php namespace VanTran\NhamBaseTerms\Terms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\PrimeStar;

class PrimeStarTest extends TestCase
{
    /**
     * @var PrimeStar
     */
    private $stars;

    public function setup(): void
    {
        $this->stars = new PrimeStar();
    }

    /**
     * @covers PrimeStar
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingleton(): void
    {
        $term1 = $this->stars->term('xa');
        $term2 = $this->stars->term(5);

        $this->assertTrue($term1 === $term2);
    }

    /**
     * @covers PrimeStar
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testMagicMethod(): void
    {
        $this->assertTrue($this->stars->term(10) === $this->stars->khong());
    }

    /**
     * @covers PrimeStar
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testMagicProp(): void
    {
        $this->assertTrue($this->stars->term(7) === $this->stars->thuong);
    }

    /**
     * @covers PrimeStar
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
}