<?php namespace VanTran\NhamBaseTerms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Factories\PrimeStarTermFactory;
use VanTran\NhamBaseTerms\Terms\AbstractSexagenaryTerm;
use VanTran\NhamBaseTerms\Terms\StarTerm;

class PrimeStarTermFactoryTest extends TestCase
{
    /**
     * 
     * @var PrimeStarTermFactory
     */
    private $factory;

    /**
     * {@inheritdoc}
     */
    public function setup(): void
    {
        $this->factory = new PrimeStarTermFactory();
    }

    /**
     * @covers PrimeStarTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByIndex(): void
    {
        $term = $this->factory->term(0);

        $this->assertEquals('hau', $term->getKey());
        $this->assertEquals('a', $term->getChar());
        $this->assertTrue($term->getElement() === Element::thuy());
        $this->assertTrue($term->getTendency() === Tendency::duong());
    }

    /**
     * @covers PrimeStarTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByChar(): void
    {
        $term = $this->factory->term('e');

        $this->assertEquals(4, $term->getIndex());
        $this->assertEquals('cau', $term->getKey());
    }

    /**
     * @covers PrimeStarTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByKey(): void
    {
        $term = $this->factory->term('long');
        
        $this->assertEquals('c', $term->getChar());
        $this->assertTrue($term->getElement() === Element::moc());
    }

    /**
     * @covers PrimeStarTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingletonInstance(): void
    {
        $term = $this->factory->term('ho');
        $refTerm = $this->factory->term(8);

        $this->assertTrue($term === $refTerm);
    }
}
