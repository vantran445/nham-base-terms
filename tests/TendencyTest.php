<?php namespace VanTran\NhamBaseTerms\Tests;

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use Throwable;
use VanTran\NhamBaseTerms\Tendency;

class TendencyTest extends TestCase
{
    /**
     * @covers Tendency
     * 
     * @return void 
     * @throws Throwable 
     * @throws ExpectationFailedException 
     */
    public function testResolvingNormalWay(): void
    {
        $term = Tendency::term('yang');

        $this->assertEquals(1, $term->getIndex());
        $this->assertTrue($term === Tendency::term('a'));
    }

    /**
     * @covers Tendency
     * 
     * @return void 
     * @throws ExpectationFailedException 
     */
    public function testResolvingMagicWay(): void
    {
        $term = Tendency::negative();

        $this->assertEquals(2, $term->getIndex());
        $this->assertTrue($term === Tendency::term('b'));
    }

    /**
     * @covers Tendency
     * 
     * @return void 
     * @throws ExpectationFailedException 
     */
    public function testNewInstance(): void
    {
        $ten = new Tendency();

        $this->assertTrue(Tendency::posive() === $ten->posive());
    }
}