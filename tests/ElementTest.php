<?php namespace VanTran\NhamBaseTerms\Tests;

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use Throwable;
use VanTran\NhamBaseTerms\Element;

class ElementTest extends TestCase
{
    /**
     * @covers Element
     * 
     * @return void 
     * @throws Throwable 
     * @throws ExpectationFailedException 
     */
    public function testResolvingNormalWay(): void
    {
        $term = Element::term('water');

        $this->assertEquals(5, $term->getIndex());
        $this->assertTrue($term === Element::term('e'));
    }

    /**
     * @covers Element
     * 
     * @return void 
     * @throws ExpectationFailedException 
     */
    public function testResolvingMagicWay(): void
    {
        $term = Element::kim();

        $this->assertEquals(4, $term->getIndex());
        $this->assertTrue($term === Element::metal());
        $this->assertTrue($term === Element::d());
    }

    /**
     * @covers Element
     * 
     * @return void 
     * @throws ExpectationFailedException 
     */
    public function testNewInstance(): void
    {
        $el = new Element();

        $this->assertTrue(Element::earth() === $el->earth());
    }
}