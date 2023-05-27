<?php namespace VanTran\NhamBaseTerms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Factories\StemTermFactory;

class StemTermFactoryTest extends TestCase
{
    /**
     * 
     * @var StemTermFactory
     */
    private $factory;

    /**
     * {@inheritdoc}
     */
    public function setup(): void
    {
        $this->factory = new StemTermFactory();
    }

    /**
     * @covers StemTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceIndex(): void
    {
        $term = $this->factory->term(1);

        $this->assertEquals('b', $term->getChar());
        $this->assertTrue($term->getElement() === Element::moc());
        $this->assertTrue($term->getTendency() === Tendency::am());
    }

    /**
     * @covers StemTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByKey(): void
    {
        $term = $this->factory->term('mau');

        $this->assertEquals(4, $term->getIndex());
        $this->assertEquals('e', $term->getChar());
    }

    /**
     * @covers StemTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByChar(): void
    {
        $term = $this->factory->term('g');
        
        $this->assertEquals('canh', $term->getKey());
    }

    /**
     * @covers StemTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingletonInstance(): void
    {
        $term = $this->factory->term('nham');
        $refTerm = $this->factory->term(8);

        $this->assertTrue($term === $refTerm);
    }
}
