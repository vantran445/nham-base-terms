<?php namespace VanTran\NhamBaseTerms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Factories\BranchTermFactory;

class BranchTermFactoryTest extends TestCase
{
    /**
     * 
     * @var BranchTermFactory
     */
    private $factory;

    /**
     * {@inheritdoc}
     */
    public function setup(): void
    {
        $this->factory = new BranchTermFactory();
    }

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByIndex(): void
    {
        $term = $this->factory->term(0);

        $this->assertEquals('ty', $term->getKey());
        $this->assertTrue($term->getElement() === Element::thuy());
        $this->assertTrue($term->getTendency() === Tendency::duong());
    }

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByChar(): void
    {
        $term = $this->factory->term('b');

        $this->assertEquals(1, $term->getIndex());
        $this->assertEquals('suu', $term->getKey());
    }

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByKey(): void
    {
        $term = $this->factory->term('hoi');

        $this->assertEquals(11, $term->getIndex());
        $this->assertEquals('l', $term->getChar());
    }

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingletonInstance(): void
    {
        $term = $this->factory->term('mao');
        $refTerm = $this->factory->term(3);

        $this->assertTrue($term === $refTerm);
    }

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testRef(): void
    {
        $term = $this->factory->term(function (BranchTermFactory $f) {
            if (!$f->isMapped('love')) {
                $f->map('love', 'ngo', false);
            }

            return 'mui';
        });

        $this->assertEquals('mui', $term->getKey());
        $this->assertEquals('ngo', $this->factory->term('love')->getKey());
        $this->assertTrue($this->factory->isMapped('love'));
    }
}
